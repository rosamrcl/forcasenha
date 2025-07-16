<?php
namespace Strong_pass\Validators;

use PHPUnit\Framework\TestCase;
use Strong_pass\Validators\passwordStrong;

class passwordStrongTest extends TestCase {

    /**
     * @dataProvider passwordDataProvider
     */
    public function testPasswordStrength($password, $expectedResult) {
        $strongPass = new passwordStrong($password);
        $isValid = $strongPass->isValid();
        $this->assertEquals($expectedResult, $isValid, "Falha para a senha: $password");
    }

    public function passwordDataProvider(): array {
        return [
            'Senha muito curta'             => ['123', false],
            'Senha sem caracteres especiais' => ['SenhaFraca123', false],
            'Senha válida'                  => ['Senha@Forte123', true],
            'Senha com espaço'              => ['Senha com espaço 123', false]
        ];
    }
}
?>