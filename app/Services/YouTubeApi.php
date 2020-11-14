<?php

namespace App\Services;

use App\Auth\GoogleUser;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class YouTubeApi
{
    /**
     * YouTube API Base URL
     */
    const BASE_URL = 'https://www.googleapis.com/youtube/v3';

    /**
     * @var GoogleUser
     */
    private $user;

    /**
     * The constructor
     */
    public function __construct()
    {
        $this->user = GoogleUser::retrieve();
    }

    /**
     * Retrieve channel members
     *
     * @return array
     */
    public function getMembers()
    {
        return $this->requestMembers();
    }

    /**
     * Get token info
     *
     * @return array
     */
    public function tokeninfo()
    {
        return $this->get('https://www.googleapis.com/oauth2/v1/tokeninfo', null, 'ERROR');
    }

    protected function requestMembers($members = [], $pageToken = '')
    {
        $params = [
            'part' => 'snippet',
            'maxResults' => 1000,
            // 'mode' => 'all_current',
            'pageToken' => $pageToken,
        ];

        $response = $this->get('members', array_filter($params), []);
        $members = array_merge($members, $response['items'] ?? []);
        if (empty($response['nextPageToken']) || empty($response['items'])) {
            return $members;
        }

        return $this->getMembers($members, $response['nextPageToken']);
    }

    /**
     * A simple get for API
     *
     * @return mixed
     */
    public function get($path, $params = [], $default = '')
    {
        $url = $this->buildUrl($path, $params);
        $response = HTTP::withToken($this->user->token)->get($url);
        if (! $response->successful()) {
            $this->log($response);
            return $default;
        }

        return $response->json();
    }

    /**
     * Build a URL with params
     *
     * @param  string $url
     * @param  array $params
     * @return string
     */
    protected function buildUrl($url, $params = [])
    {
        if (strpos($url, 'https://') !== 0) {
            $url = self::BASE_URL . '/' . ltrim($url, '/');
        }

        if (! empty($params)) {
            $url .= '?' . Arr::query($params);
        }

        return $url;
    }

    /**
     * Log a error
     *
     * @param  Response $e
     * @return void
     */
    protected function log(Response $response)
    {
        Log::error('[YouTube API Service] ' . $response->body());
    }
}
