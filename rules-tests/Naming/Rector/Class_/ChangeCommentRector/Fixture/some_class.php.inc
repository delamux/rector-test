<?php

namespace Rector\Tests\Naming\Rector\Class_\ChangeCommentRector\Fixture;
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

?>
-----
<?php

namespace Rector\Tests\Naming\Rector\Class_\ChangeCommentRector\Fixture;

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

?>
