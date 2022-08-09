<?php

declare (strict_types=1);
namespace Rector\Naming\Rector\Class_;

use PhpParser\Node;
use PHPStan\PhpDocParser\Ast\PhpDoc\PhpDocTagValueNode;
use Rector\BetterPhpDocParser\PhpDocInfo\PhpDocInfo;
use Rector\Core\Rector\AbstractRector;
use Rector\NodeTypeResolver\Node\AttributeKey;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;
/**

* @see \Rector\Tests\Naming\Rector\Class_\ChangeCommentRector\ChangeCommentRectorTest
*/
final class ChangeCommentRector extends AbstractRector
{
    public function getRuleDefinition() : RuleDefinition
    {
        return new RuleDefinition('"A comment it will be replaced by Hello comment"', [new CodeSample(<<<'CODE_SAMPLE'
/**
 * Initialization hook method.
 *
 * Use this method to add common initialization code like loading components.
 *
 * e.g. `$this->loadComponent('FormProtection');`
 *
 * @return void
 */
class SomeClass
{
}
CODE_SAMPLE
, <<<'CODE_SAMPLE'
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
class SomeClass
{
}
CODE_SAMPLE
)]);
    }
    /**
     * @return array<class-string<Node>>
     */
    public function getNodeTypes() : array
    {
        return [\PhpParser\Node\Stmt\Class_::class];
    }
    /**
     * @param \PhpParser\Node\Stmt\Class_ $node
     */
    public function refactor(Node $node) : ?Node
    {
        // change the node
        /**
         * @var PhpDocInfo $phpDocInfo
         */
        $phpDocInfo = $node->getAttribute(AttributeKey::PHP_DOC_INFO);
        dd($phpDocInfo);

        if ($phpDocInfo->hasByName('Hello Jorge')) {
            return null;
        }

        $phpDocInfo->getTags();

        return $node;
    }
}
