<?php
namespace Strong_pass\Validators;

use PHPUnit\Framework\TestCase;
use Strong_pass\ValidatorspasswordStrong;

class passwordStrongTest extends TestCase {

    public function testPasswordStrength() {
        $dataProvider = [
            'Senha muito curta' => ['123', false],
            'Senha sem caracteres especiais' => ['SenhaFraca123', false],
            'Senha válida' => ['Senha@Forte123', true],
            'Senha com espaço' => ['Senha com espaço 123', false]
        ];
        
        foreach ($dataProvider as $value => $expectedResult) {
            $strongPass = new passwordStrong($value);
            $isValid = $strongPass->isValid();
            
            $this->assertEquals($expectedResult, $isValid, "Failed for password: $value");
        }
    }
}
?>