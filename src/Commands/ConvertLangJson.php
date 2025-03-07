<?php

namespace Inovector\MixpostEnterprise\Commands;

use Inovector\Mixpost\Commands\ConvertLangJson as Command;

class ConvertLangJson extends Command
{
    protected $signature = 'mixpost-enterprise:convert-lang-json';

    protected function langFolderPath(): string
    {
        return __DIR__ . '/../../resources/lang';
    }

    protected function langFolderJsonPath(): string
    {
        return __DIR__ . '/../../resources/lang-json';
    }
}
