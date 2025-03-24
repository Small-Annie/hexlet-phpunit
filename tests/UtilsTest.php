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
        $parts = [__DIR__,'fixtures', $fixtureName];
        return realpath(implode('/', $parts));
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

        $originalString = file_get_contents($this->getFixtureFullPath('original-long-string.ini'));
        $reversedString = file_get_contents($this->getFixtureFullPath('reversed-long-string.ini'));
        $this->assertEquals($reversedString, reverseString($originalString));
    }
}
