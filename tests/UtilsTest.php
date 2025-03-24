<?php

namespace Hexlet\Phpunit\Tests;

use PHPUnit\Framework\TestCase;

use function Hexlet\Phpunit\Utils\reverseString;

// Класс UtilsTest наследует класс TestCase
// Имя класса совпадает с именем файла
class UtilsTest extends TestCase
{
    public function getFixtureFullPath(string $fixtureName): string
    {
        $parts = [__DIR__, 'fixtures', $fixtureName];
        $fullPath = realpath(implode('/', $parts));

        if ($fullPath === false) {
            throw new \RuntimeException("File not found: " . implode('/', $parts));
        }

        return $fullPath;
    }

    public function getFileContents(string $fixtureName): string
    {
        $content = file_get_contents($this->getFixtureFullPath($fixtureName));
        if ($content === false) {
            throw new \RuntimeException("Failed to read the file: " . $fixtureName);
        }
        return $content;
    }

    // Метод (функция), определенный внутри класса,
    // Должен начинаться со слова test
    // Ключевое слово public нужно, чтобы PHPUnit мог вызвать этот тест снаружи
    public function testReverse(): void
    {
        // Сначала идет ожидаемое значение (expected)
        // И только потом актуальное (actual)
        $this->assertEquals('', reverseString(''));
        $this->assertEquals('olleh', reverseString('hello'));

        $originalString = $this->getFileContents('original-long-string.ini');
        $reversedString = $this->getFileContents('reversed-long-string.ini');
        $this->assertEquals($reversedString, reverseString($originalString));
    }
}
