<?php

use Tests\BrowserTestCase;

class GoldenMasterTestCase extends BrowserTestCase
{
    use CreatesApplication;

    protected $snapshotDir = "tests/snapshots/";

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
        $this->session->visit($this->baseUrl.$path);
        $this->assertNotEquals(404, $this->session->getStatusCode());
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
        return $this->session->getPage()->getHtml();
    }

    protected function getPath()
    {
        $url = $this->session->getCurrentUrl();
        $path = parse_url($url, PHP_URL_PATH);
        $query = parse_url($url, PHP_URL_QUERY);
        $frag = parse_url($url, PHP_URL_FRAGMENT);
        return $path.$query.$frag;
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
        return preg_replace('/<input type="hidden"[^>]+\>/i', '', $html);
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
