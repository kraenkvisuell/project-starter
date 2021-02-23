<?php

namespace Kraenkvisuell\ProjectStarter;

class ComposerWriter
{
    public function addRepository($repository)
    {
        // make backup
        copy(base_path('composer.json'), base_path('composer.backup.json'));

        $json = json_decode(file_get_contents(base_path('composer.json')));
        
        if (!isset($json->repositories)) {
            $json->repositories = [];
        }

        $exists = false;
        $message = '"'.$repository['url'].'" added to composer repositories.';

        foreach ($json->repositories as $jsonRepository) {
            if($jsonRepository->url == $repository['url']) {
                $exists = true;
                $message = '"'.$repository['url'].'" already existed in composer repositories.';
            }
        }

        if (!$exists) {
            $json->repositories[] = (object) $repository;    
            
            $jsonString = json_encode($json, JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES)."\n";

            file_put_contents(base_path('composer.json'), $jsonString);
        }
        
        return [
            'message' => $message,
            'existed' => $exists,
        ];
    }

    public function AddRequire($repoName, $repoVersion)
    {
        copy(base_path('composer.json'), base_path('composer.backup.json'));

        $json = json_decode(file_get_contents(base_path('composer.json')));
        
        $require = (array) $json->require;
        
        $exists = true;
        $message = '"'.$repoName.'" already existed in composer require.';

        if (!isset($require[$repoName])) {
            $require[$repoName] = $repoVersion;
            ksort($require);

            // put php back to top
            $phpEntry = $require['php'];
            unset($require['php']);

            $require = array_merge(['php' => $phpEntry], $require);

            $json->require = (object) $require;
            
            $jsonString = json_encode($json, JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES)."\n";

            file_put_contents(base_path('composer.json'), $jsonString);

            $exists = false;
            $message = '"'.$repoName.'" added to composer require.';
        }

        return [
            'message' => $message,
            'existed' => $exists,
        ];
    }
}
