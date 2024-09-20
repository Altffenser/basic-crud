<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\Post;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Override;
use RyanChandler\Comments\Models\Comment;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    #[Override]
    public function register(): void
    {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // @codeCoverageIgnoreStart
        UploadedFile::macro('makeFromUrl', function (string $url): ?UploadedFile {
            $tempFile = tempnam(sys_get_temp_dir(), str()->random(32));

            if ($tempFile === false) {
                return null;
            }

            $file = file_get_contents($url);

            if ($file === false) {
                return null;
            }

            file_put_contents($tempFile, $file);

            if (dir(__DIR__ . 'vendor')) {
                Relation::morphMap([
                    'post' => Post::class,
                    'comment' => Comment::class,
                ]);
            }

            return new UploadedFile(
                $tempFile,
                basename($url),
                mime_content_type($tempFile) ?: null,
                null,
                true
            );
        });
        // @codeCoverageIgnoreEnd

        // Register icon directive for Blade (Tabler Icons)
        Blade::directive('icon', function ($expression) {
            return "<i class=\"ti ti-{{ $expression }}\"></i>";
        });

    }
}
