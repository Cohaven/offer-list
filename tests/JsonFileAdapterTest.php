<?php 

use PHPUnit\Framework\TestCase;
use App\Adapter\JsonFileAdapter;

final class JsonFileAdapterTest extends TestCase
{
    const GOOD_FILE = './tests/files/c51.json';
    const BAD_FILE = './tests/files/bad-json.json';
    const GOOD_KEY = 'offers';
    const BAD_KEY = 'stores';
    const GOOD_SORT_BY = 'name';

    protected $adapter;

    protected function setUp(): void
    {
        $this->adapter = new JsonFileAdapter();
    }

    public function testCanFindFile(): void
    {
        $this->assertFileExists(self::GOOD_FILE);

        $data = $this->adapter->find(self::GOOD_KEY, self::GOOD_FILE, self::GOOD_SORT_BY);

        $this->assertIsArray($data);
        $this->assertArrayHasKey(self::GOOD_SORT_BY, $data[0]);
    }

    public function testCanFindWithoutSort(): void
    {
        $this->assertFileExists(self::GOOD_FILE);

        $data = $this->adapter->find(self::GOOD_KEY, self::GOOD_FILE);

        $this->assertIsArray($data);
        $this->assertArrayHasKey(self::GOOD_SORT_BY, $data[0]);
    }

    public function testCanFindEmpty(): void
    {
        $this->assertFileExists(self::GOOD_FILE);

        $data = $this->adapter->find(self::BAD_KEY, self::GOOD_FILE);

        $this->assertIsArray($data);
        $this->assertTrue(empty($data));
    }

    public function testCannotFindWithoutFile(): void
    {
        $this->expectException(\Exception::class);

        $this->adapter->find(self::GOOD_KEY, '', self::GOOD_SORT_BY);
    }

    public function testCannotFindWithBadJson(): void
    {
        $this->expectException(\Exception::class);
        $this->assertFileExists(self::BAD_FILE);
        
        $this->adapter->find(self::GOOD_KEY, self::BAD_FILE, self::GOOD_SORT_BY);
    }
}