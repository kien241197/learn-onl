<?php

namespace App\Jobs;

use App\Helpers\Common;
use App\Models\Lesson;
use FFMpeg\Filters\Video\WatermarkFilter;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use ProtoneMedia\LaravelFFMpeg\Filters\WatermarkFactory;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;

class RenderVideoJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var string
     */
    private string $sourceVideo;
    /**
     * @var string
     */
    private string $phoneWatermark;

    /**
     * * Create a new job instance.
     * @param string $sourceVideo
     * @param string $phoneWatermark
     */
    public function __construct(string $sourceVideo, string $phoneWatermark)
    {
        $this->sourceVideo = $sourceVideo;
        $this->phoneWatermark = $phoneWatermark;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        if (File::exists(public_path($this->sourceVideo))) {
            echo "Start render video $this->sourceVideo" . PHP_EOL;
            $lesson = Lesson::where('video_path', $this->sourceVideo)->first();
            if ($lesson) {
                $lesson->status_render_video = Lesson::STATUS_RENDER_PENDING;
                $lesson->save();
                try {
                    $linkVideoOld = ltrim($this->sourceVideo, 'storage/');
                    $linkVideoNew = str_replace('storage/videos', 'storage/watermark', $this->sourceVideo);
                    $linkImage = ltrim(Common::getImageByString($this->phoneWatermark), 'storage/');
                    if ($linkImage) {
                        FFMpeg::fromDisk('videos')->open($linkVideoOld)
                            ->addWatermark(function (WatermarkFactory $watermark) use ($linkImage) {
                                $watermark->fromDisk('videos')->open($linkImage)
                                    ->horizontalAlignment(WatermarkFactory::LEFT, 10)
                                    ->verticalAlignment(WatermarkFactory::TOP, 10);
                            })
                            ->export()
                            ->inFormat(new \FFMpeg\Format\Video\X264())
                            ->save(ltrim($linkVideoNew, 'storage/'));
                    $lesson->status_render_video = Lesson::STATUS_RENDER_SUCCESS;
                    $lesson->video_path = $linkVideoNew;
                    $lesson->save();
                    echo "Render success";
                    } else {
                        echo "not create image text";
                    }

                } catch (\Exception $e) {
                    echo $e->getMessage();
                    Log::error($e->getMessage());
                    $lesson->status_render_video = Lesson::STATUS_RENDER_FAIL;
                    $lesson->save();
                }
            }
        }
    }
}
