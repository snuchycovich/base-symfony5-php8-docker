<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerTC7Qd6y\App_KernelDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerTC7Qd6y/App_KernelDebugContainer.php') {
    touch(__DIR__.'/ContainerTC7Qd6y.legacy');

    return;
}

if (!\class_exists(App_KernelDebugContainer::class, false)) {
    \class_alias(\ContainerTC7Qd6y\App_KernelDebugContainer::class, App_KernelDebugContainer::class, false);
}

return new \ContainerTC7Qd6y\App_KernelDebugContainer([
    'container.build_hash' => 'TC7Qd6y',
    'container.build_id' => '5260f9d2',
    'container.build_time' => 1616845530,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerTC7Qd6y');
