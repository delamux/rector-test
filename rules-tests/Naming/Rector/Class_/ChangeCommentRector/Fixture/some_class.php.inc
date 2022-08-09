<?php

namespace Rector\Tests\Naming\Rector\Class_\ChangeCommentRector\Fixture;

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
