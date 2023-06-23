<?php

declare(strict_types=1);

namespace Luzrain\TelegramBotApi;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\RequestOptions;
use Luzrain\TelegramBotApi\Exception\TelegramBotApiException;
use Luzrain\TelegramBotApi\Method\GetFile;
use Luzrain\TelegramBotApi\Method\SendMediaGroup;
use Luzrain\TelegramBotApi\Type\File;
use Luzrain\TelegramBotApi\Type\InputFile;
use Luzrain\TelegramBotApi\Type\InputMediaAudio;
use Luzrain\TelegramBotApi\Type\InputMediaDocument;
use Luzrain\TelegramBotApi\Type\InputMediaPhoto;
use Luzrain\TelegramBotApi\Type\InputMediaVideo;
use Luzrain\TelegramBotApi\Type\ResponseParameters;

/**
 * Service for execute telegram methods
 */
final class BotApi
{
    use Methods;

    private const URL_API_ENDPOINT = 'https://api.telegram.org/bot%s/%s';
    private const URL_FILE_ENDPOINT = 'https://api.telegram.org/file/bot%s/%s';

    private string $token;
    private HttpClient $httpClient;

    public function __construct(string $token, array $options = [])
    {
        $this->token = $token;
        $this->httpClient = new HttpClient($options);
    }

    /**
     * Execute telergam method
     *
     * @throws TelegramBotApiException
     */
    public function call(BaseMethod $method): BaseType|array|string|int|bool
    {
        $url = sprintf(self::URL_API_ENDPOINT, $this->token, $method->getMethodName());
        $options = [];
        $multiparts = [];
        $files = [];

        foreach ($method->getRequest() as $name => $data) {
            if ($data instanceof InputFile) {
                $files[] = $data;
                $contents = $data->getAttachPath();
            } else {
                $contents = is_scalar($data) ? $data : json_encode($data);
            }

            if ($method instanceof SendMediaGroup && $name === 'media') {
                /** @var list<InputMediaAudio|InputMediaDocument|InputMediaPhoto|InputMediaVideo> $data */
                foreach ($data as $inputMedia) {
                    $mediaFile = $inputMedia->getMedia();
                    if ($mediaFile instanceof InputFile) {
                        $files[] = $mediaFile;
                    }
                    if (!$inputMedia instanceof InputMediaPhoto) {
                        $mediaThumbnail = $inputMedia->getThumbnail();
                        if ($mediaThumbnail instanceof InputFile) {
                            $files[] = $mediaThumbnail;
                        }
                    }
                }
            }

            $multiparts[] = compact('name', 'contents');
        }

        if ($multiparts !== []) {
            $options[RequestOptions::MULTIPART] = $multiparts;
        }

        foreach ($files as $file) {
            $name = $file->getUniqueName();
            $contents = fopen($file->getFilePath(), 'r');
            $options[RequestOptions::MULTIPART][] = compact('name', 'contents');
        }

        try {
            $httpResponse = $this->httpClient->request('POST', $url, $options);
        } catch (ClientException $exception) {
            $httpResponse = $exception->getResponse();
        }

        $response = json_decode((string) $httpResponse->getBody(), true);

        if ($response['ok'] === false) {
            $parameters = isset($response['parameters']) ? ResponseParameters::fromResponse($response['parameters']) : null;
            throw new TelegramBotApiException($response['description'], $response['error_code'], $exception ?? null, $parameters);
        }

        return $method->createResponse($response['result']);
    }

    /**
     * Download telegram file
     *
     * @param File|string $file File object or string with fileId
     * @return string path to saved file on filesystem
     * @throws TelegramBotApiException
     */
    public function downloadFile(File|string $file): string
    {
        if (is_string($file)) {
            $file = $this->call(new GetFile($file));
        }

        /**
         * @TODO remove it
         */
        /** @var File $file */
        $fileUrl = sprintf(self::URL_FILE_ENDPOINT, $this->token, $file->getFilePath());
        $fileExtension = pathinfo($file->getFilePath(), PATHINFO_EXTENSION);
        $downloadFilePath = sys_get_temp_dir() . '/' . uniqid('tgfile_', true) . '.' . $fileExtension;
        $options = [RequestOptions::SINK => $downloadFilePath];

        try {
            $this->httpClient->request('GET', $fileUrl, $options);
        } catch (ClientException $exception) {
            if (is_file($downloadFilePath)) {
                unlink($downloadFilePath);
            }

            $response = json_decode((string) $exception->getResponse()->getBody(), true);
            throw new TelegramBotApiException($response['description'], $response['error_code'], $exception);
        }

        return $downloadFilePath;
    }

    public function __call(string $methodName, array $arguments): BaseType|array|string|int|bool
    {
        return $this->call($this->getMethodObject($methodName, $arguments));
    }
}
