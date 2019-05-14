<?php

namespace Tests;

use Tests\BrowserTestCase;

class GoldenMasterTestCase extends BrowserTestCase
{
    protected $snapshotDir = "tests/snapshots/";

    protected $response;

    protected $path;

    public function loginAs($username, $password)
    {
        $this->session->visit($this->baseUrl.'/login');
        $page = $this->session->getPage();
        $page->fillField("username", $username);
        $page->fillField("password", $password);
        $page->pressButton("Sign In");
        return $this;
    }

    public function goto($path)
    {
        $this->path = $path;
        $response = $this->call('GET', $path);
        $this->response = $response;
        $this->assertNotEquals(404, $response->status());
        return $this;
    }

    public function saveHtml()
    {
        if (!$this->snapshotExists()) {
            $this->saveSnapshot();
        }
        return $this;
    }

    public function assertSnapshotsMatch()
    {
        $path = $this->getPath();
        $newHtml = $this->processHtml($this->getHtml());
        $oldHtml = $this->getOldHtml();
        $diff = "";
        if (function_exists('xdiff_string_diff')) {
            $diff = xdiff_string_diff($oldHtml, $newHtml);
        }
        $message = "The path $path does not match the snapshot\n$diff";
        self::assertThat($newHtml == $oldHtml, self::isTrue(), $message);
    }

    protected function getHtml()
    {
        return $this->response->getContent();
    }

    protected function getPath()
    {
        return $this->path;
    }

    protected function getEscapedPath()
    {
        return $this->snapshotDir.str_replace('/', '_', $this->getPath()).'.snap';
    }

    protected function snapshotExists()
    {
        return file_exists($this->getEscapedPath());
    }

    protected function processHtml($html)
    {
        return preg_replace('/(<input type="hidden"[^>]+\>|<meta name="csrf-token" content="([a-zA-Z0-9]+)">)/i', '', $html);
    }

    protected function saveSnapshot()
    {
        $html = $this->processHtml($this->getHtml());
        file_put_contents($this->getEscapedPath(), $html);
    }

    protected function getOldHtml()
    {
        return file_get_contents($this->getEscapedPath());
    }

}
