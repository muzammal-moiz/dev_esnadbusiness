<?php

namespace App\Http\Livewire\Main\Page;

use App\Models\Page;
use App\Models\Admin;
use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use App\Mail\Admin\NewRewardsProgramAppliction;
use App\Http\Validators\Main\Contact\ContactValidator;
use Lukeraymonddowning\Honey\Traits\WithHoney;
use Lukeraymonddowning\Honey\Traits\WithRecaptcha;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class PageComponent extends Component
{
    use WithHoney, WithRecaptcha,SEOToolsTrait;
    
    public $page;
    public $name,$country,$phone,$website;
    public $selectedPresenterWays = [],$selectedPresenterExplain,$howCanHelpUs = [],$howCanHelpUsExplain,$howMuchTime=[],$experience,$marketingExperience,$clientsCount,$clientsCountExplain,$enterprenorsCount;
    protected $rules = [
        'name' => 'required|string|min:4',
        'country' => 'required|string|min:4',
        'phone' => 'required|string|min:9',
        'website' => 'required|string|url',
        'selectedPresenterWays' => 'required|array',
        'selectedPresenterWays.*' => 'string',
        'selectedPresenterExplain' => 'nullable|string',
        'howCanHelpUs' => 'required|array',
        'howCanHelpUs.*' => 'string',
        'howCanHelpUsExplain' => 'nullable|string',
        'howMuchTime' => 'required|array',
        'howMuchTime.*' => 'string',
        'experience' => 'required|string',
        'marketingExperience' => 'required|string',
        'clientsCount' => 'required|string',
        'clientsCountExplain' => 'nullable|string',
        'enterprenorsCount'=>'required|string'
       
    ];
     protected $messages = [
        '*.required' => 'هذه الخانة إجبارية',
        '*.string' => 'يجب أن تكون هذه الخانة نصا',
    ];
    /**
     * Init component
     *
     * @param string $slug
     * @return void
     */
    public function mount($slug)
    {
        // Get page
        $page = Page::where('slug', $slug)->firstOrFail();

        // Check if link
        if ($page->is_link) {
            return redirect($page->link);
        }

        // Set page
        $this->page = $page;

    }


    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // SEO
        $separator   = settings('general')->separator;
        $title       = $this->page->title . " $separator " . settings('general')->title;
        $description = settings('seo')->description;
        $ogimage     = src( settings('seo')->ogimage );

        $this->seo()->setTitle( $title );
        $this->seo()->setDescription( $description );
        $this->seo()->setCanonical( url()->current() );
        $this->seo()->opengraph()->setTitle( $title );
        $this->seo()->opengraph()->setDescription( $description );
        $this->seo()->opengraph()->setUrl( url()->current() );
        $this->seo()->opengraph()->setType('website');
        $this->seo()->opengraph()->addImage( $ogimage );
        $this->seo()->twitter()->setImage( $ogimage );
        $this->seo()->twitter()->setUrl( url()->current() );
        $this->seo()->twitter()->setSite( "@" . settings('seo')->twitter_username );
        $this->seo()->twitter()->addValue('card', 'summary_large_image');
        $this->seo()->metatags()->addMeta('fb:page_id', settings('seo')->facebook_page_id, 'property');
        $this->seo()->metatags()->addMeta('fb:app_id', settings('seo')->facebook_app_id, 'property');
        $this->seo()->metatags()->addMeta('robots', 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1', 'name');
        $this->seo()->jsonLd()->setTitle( $title );
        $this->seo()->jsonLd()->setDescription( $description );
        $this->seo()->jsonLd()->setUrl( url()->current() );
        $this->seo()->jsonLd()->setType('WebSite');

        return view('livewire.main.page.page')->extends('livewire.main.layout.app')->section('content');
    }
     public function updatedSelectedPresenterWays()
      {
        if (!is_array($this->selectedPresenterWays)) return;
    
        $this->selectedPresenterWays = array_filter($this->selectedPresenterWays, function ($option) {
          return $option != false;
        });
      }
     public function updatedHowCanHelpUs()
      {
        if (!is_array($this->howCanHelpUs)) return;
    
        $this->howCanHelpUs = array_filter($this->howCanHelpUs, function ($option) {
          return $option != false;
        });
      }
     public function updatedHowMuchTime()
      {
        if (!is_array($this->howMuchTime)) return;
    
        $this->howMuchTime = array_filter($this->howMuchTime, function ($option) {
          return $option != false;
        });
      }
    /**
     * Send
     *
     * @return void
     */
    public function send()
    {
        try {

            // Check if recaptcha enabled
            if (settings('security')->is_recaptcha) {
                
                // Check if recaptcha passed
                if (!$this->recaptchaPasses()) {
                    
                    // Error recaptcha
                    $this->dispatchBrowserEvent('alert',[
                        "message" => __('messages.t_recaptcha_error_message'),
                        "type"    => "error"
                    ]);

                    return;

                }

            }
            
            // dd("Working on it !");
            $data = $this->validate();
           

            // Send notification to admin
            $email =new NewRewardsProgramAppliction($data);
            Mail::to('ayatir04@gmail.com')->send($email);
            // Reset form
            $this->reset();

            // Success
            $this->dispatchBrowserEvent('alert',[
                "message" => __('messages.t_your_message_support_received_success'),
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {

            // Validation error
            $this->dispatchBrowserEvent('alert',[
                "message" => __('messages.t_toast_form_validation_error'),
                "type"    => "error"
            ]);

            throw $e;

        } catch (\Throwable $th) {

            // Error
            $this->dispatchBrowserEvent('alert',[
                "message" => __('messages.t_toast_something_went_wrong'),
                "type"    => "error"
            ]);

            throw $th;

        }
        catch(Exception $ex)
        {
            dd($ex);
        }
    }
    
}