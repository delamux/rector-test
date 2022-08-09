<?php

declare (strict_types=1);
namespace RectorPrefix202208;

use PhpParser\Node\Stmt\Class_;
use Rector\RectorGenerator\Provider\RectorRecipeProvider;
use Rector\RectorGenerator\ValueObject\Option;
use RectorPrefix202208\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
// run "bin/rector generate" to a new Rector basic schema + tests from this config
return static function (ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    // [REQUIRED]
    $rectorRecipeConfiguration = [
        // [RECTOR CORE CONTRIBUTION - REQUIRED]
        // package name, basically namespace part in `rules/<package>/src`, use PascalCase
        Option::PACKAGE => 'Naming',
        // name, basically short class name; use PascalCase
        Option::NAME => 'ChangeCommentRector',
        // 1+ node types to change, pick from classes here https://github.com/nikic/PHP-Parser/tree/master/lib/PhpParser/Node
        // the best practise is to have just 1 type here if possible, and make separated rule for other node types
        Option::NODE_TYPES => [Class_::class],
        // describe what the rule does
        Option::DESCRIPTION => '"A comment it will be replaced by Hello comment"',
        // code before change
        // this is used for documentation and first test fixture
        Option::CODE_BEFORE => <<<'CODE_SAMPLE'
class SomeClass
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('FormProtection');`
     *
     * @return void
     */
    public function run()
    {
        $this->something();
    }
}
CODE_SAMPLE
,
        // code after change
        Option::CODE_AFTER => <<<'CODE_SAMPLE'
class SomeClass
{
    /**
     * Hello Jorge
     *
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('FormProtection');`
     *
     * @return void
     */
    public function run()
    {
        $this->somethingElse();
    }
}
CODE_SAMPLE
,
    ];
    $services->set(RectorRecipeProvider::class)->arg('$rectorRecipeConfiguration', $rectorRecipeConfiguration);
};
