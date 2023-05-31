<?php

namespace App\Console\Commands;

use App\Jobs\RenderVideoJob;
use App\Models\CmsLayout;
use App\Models\Lesson;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;

class RenderVideo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'render-video {--status=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'job sync video ';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $status = (int)Arr::get($this->options(), 'status') ?? Lesson::STATUS_RENDER_NEW;
        $datas = Lesson::where('status_render_video', $status)->get(['video_path']);
        if ($datas->isNotEmpty()) {
            $phoneWatermark = CmsLayout::getInstance()->getPhoneNumberWatermark();
            if ($phoneWatermark) {
                foreach ($datas as $item) {
                    dispatch(new RenderVideoJob($item->video_path, $phoneWatermark))->delay(now()->addSeconds(3));
                }
            }
        }
    }
}
