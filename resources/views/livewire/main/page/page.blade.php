<div class="w-full px-2 lg:px-0">
    <div class="w-full lg:max-w-4xl mx-auto">
        <div class="relative py-16 bg-white overflow-hidden rounded-md shadow-sm border border-gray-100">
            <div class="relative px-4 sm:px-6 lg:px-8">
                <div class="text-lg mx-auto">
                    <h1>
                        <span class="block text-xl text-center leading-8 font-extrabold tracking-wide text-gray-900 sm:text-3xl mb-2">{{ $page->title }}</span>
                        @if($page->slug != "rewards-program")
                        <span class="block text-xs text-center text-gray-400 font-normal tracking-widest">
                            {{ __('messages.t_page_last_update_date', ['date' => format_date($page->updated_at)]) }}
                        </span>
                        @endif
                    </h1>
                </div>
                <div class="mt-16">
                    {!! $page->content !!}
                    @if($page->slug == "rewards-program")
                        {{-- Section content --}}
                        <div class="">
                            <div class="grid grid-cols-12 gap-5">
                                <div class="col-span-12 text-justify" style="text-align: justify;">
                                    عزيزي زائر منصة إسناد الأعمال لقد تم تصميم خطة مكافآت برامج الشراكة التابعة الخاصة بنا لنمنحك أفضل تجربة ممكنة للربح من الإنترنت بما في ذلك كيفية تعديل التفضيلات الخاصة بك والحصول على العمولات الثابتة، كما تسمح لك الإحصاءات والتقارير الشفافة بمراقبة وتلقي عمولاتك، وفريقنا المتخصص لبرنامج الشراكة التابعة على استعداد تام لتوجيهك ومساعدتك في جميع الأسئلة التي قد تكون لديك وتقديم حلول مخصصة لذلك، في حال كنت تريد التسجيل معنا في برنامج الشراكة

التابعة نأمل منك تعبئة النموذج التالي:
                                </div> 
                                {{-- Fullname --}}
                                <div class="col-span-12">
                                    <x-forms.text-input 
                                        :label="__('messages.t_name_new')"
                                        :placeholder="__('messages.t_name_new')"
                                        icon="account"
                                        model="name" /> 
                                </div>
                                
                                {{-- Country --}}
                                <div class="col-span-12">
                                    <x-forms.text-input 
                                        :label="__('messages.t_country_new')"
                                        :placeholder="__('messages.t_country_new')"
                                        icon="format-text"
                                        model="country" />
                                </div>
                                {{-- Phone --}}
                                <div class="col-span-12">
                                    <x-forms.text-input 
                                        :label="__('messages.t_phone_new')"
                                        :placeholder="__('messages.enter_t_phone_new')"
                                        icon="phone"
                                        model="phone"
                                        />
                                </div>
                
                                {{-- Subject --}}
                                <div class="col-span-12">
                                    <x-forms.text-input 
                                        :label="__('messages.t_web_new')"
                                        placeholder="الرابط"
                                        icon="web"
                                        model="website" />
                                </div>
                                 <div class="col-span-12">
                                ما هي أفضل طريقة برأيك لتمثيل منصة إسناد الأعمال؟
                <div class="col-span-12 md:col-span-6">
                    <div>
                        @php 
                         $options = [ 
                            [
                            'text' => __('messages.t_select_choose_1_1'), 
                            'value' => __('messages.t_select_choose_1_1')],
                            [
                            'text' => __('messages.t_select_choose_1_2'), 'value' => __('messages.t_select_choose_1_2')
                            ],
                            [
                            'text' => __('messages.t_select_choose_1_3'), 'value' => __('messages.t_select_choose_1_3')
                            ],
                            [
                            'text' => __('messages.t_select_choose_1_4'), 'value' => __('messages.t_select_choose_1_4')
                            ],
                            ];
                        @endphp
                        @foreach($options as $key=>$option)
                        <label class="block my-3">
                            <input class="rounded border-gray-400"
                                type="checkbox"
                                wire:model="selectedPresenterWays.{{$key}}"
                                value="{{ $option['value'] }}"
                            >
                            {{ $option['text'] }}
                        </label>
                         @endforeach
                         @error('selectedPresenterWays')
                            <p class="mt-1 text-xs text-red-600 dark:text-red-500">{{ $errors->first('selectedPresenterWays') }}</p>
                         @enderror
                    </div>
                    <!--<div class="w-full" wire:ignore.self>-->
                    <!--    <x-forms.select2-->
                    <!--        :label="__('messages.t_dot')"-->
                    <!--        placeholder="sdfsdf"-->
                    <!--        model="field_1"-->
                    <!--        :options="[ -->
                    <!--        [-->
                    <!--        'text' => __('messages.t_select_choose_1_1'), -->
                    <!--        'value' => __('messages.t_select_choose_1_1')],-->
                    <!--        [-->
                    <!--        'text' => __('messages.t_select_choose_1_2'), 'value' => __('messages.t_select_choose_1_2')-->
                    <!--        ],-->
                    <!--        [-->
                    <!--        'text' => __('messages.t_select_choose_1_3'), 'value' => __('messages.t_select_choose_1_3')-->
                    <!--        ],-->
                    <!--        [-->
                    <!--        'text' => __('messages.t_select_choose_1_4'), 'value' => __('messages.t_select_choose_1_4')-->
                    <!--        ],-->
                    <!--        ]"-->
                    <!--        :isDefer="true"-->
                    <!--        :isAssociative="false"-->
                    <!--        :isMultiple="true"-->
                    <!--        :componentId="1"-->
                    <!--        value="value"-->
                    <!--        text="text" />-->
                    <!--</div>-->
                </div>
                                </div>            

                                <div class="col-span-12">
                                    <x-forms.textarea 
                                        :label="__('messages.t_dot')"
                                        :placeholder="__('messages.enter_t_web_new')"
                                        icon="format-text"
                                        model="selectedPresenterExplain" />
                                </div>
                                
                                <div class="col-span-12">
                                كيف يمكنك مساعدتنا على وسائل التواصل الاجتماعي؟
                                 <div class="col-span-12 md:col-span-6">
                                     <div>
                                        @php 
                                         $options = [ 
                                            [
                                            'text' => __('دعوة أصدقائي للإعجاب بكم'), 
                                            'value' => __('دعوة أصدقائي للإعجاب بكم')],
                                            [
                                            'text' => 'مشاركة أخبار منصة إسناد الأعمال', 'value' =>'مشاركة أخبار منصة إسناد الأعمال'
                                            ],
                                            [
                                            'text' => 'النشر عن منصة إسناد الأعمال في بعض الصفحات أو المجموعات', 'value' => 'النشر عن منصة إسناد الأعمال في بعض الصفحات أو المجموعات'
                                            ],
                                            [
                                            'text' => ' اقتراح بعض المواقع للنشر بها', 'value' =>' اقتراح بعض المواقع للنشر بها'
                                            ],
                                            [
                                            'text' => 'التواصل مع المدونات للنشر بها', 'value' => 'التواصل مع المدونات للنشر بها'
                                            ],
                                            ];
                                        @endphp
                                        @foreach($options as $key=>$option)
                                        <label class="block my-3">
                                            <input class="rounded border-gray-400"
                                                type="checkbox"
                                                wire:model="howCanHelpUs.{{$key}}"
                                                value="{{ $option['value'] }}"
                                            >
                                            {{ $option['text'] }}
                                        </label>
                                         @endforeach
                                          @error('howCanHelpUs')
                                            <p class="mt-1 text-xs text-red-600 dark:text-red-500">{{ $errors->first('howCanHelpUs') }}</p>
                                         @enderror
                                     </div>
                                </div>
                                </div>
                                
                                <div class="col-span-12">
                                    <x-forms.textarea 
                                        :label="__('messages.t_dot')"
                                        :placeholder="__('messages.enter_t_web_new')"
                                        icon="format-text"
                                        model="howCanHelpUsExplain" />
                                </div>
                                
                                <div class="col-span-12">                          
                                كم ساعة يمكنك تخصيصها للعمل أسبوعياً؟
                                <div class="col-span-12 md:col-span-6">
                                     <div>
                                        @php 
                                         $options = [ 
                                            [
                                            'text' => '  أكثر من 20 ساعة', 
                                            'value' => ' أكثر من 20 ساعة '
                                            ],
                                            [
                                            'text' => '  10 - 20 ساعة ', 
                                            'value' => '  10 - 20 ساعة'
                                            ],
                                            [
                                            'text' => '  5 - 10 ساعة ', 
                                            'value' => '  5 - 10 ساعة'
                                            ],
                                            [
                                            'text' => 'أقل من 5 ساعات ', 
                                            'value' => 'أقل من 5 ساعات'
                                            ],
                                            
                                            ];
                                        @endphp
                                        @foreach($options as $key=>$option)
                                        <label class="block my-3">
                                            <input class="rounded border-gray-400"
                                                type="checkbox"
                                                wire:model="howMuchTime.{{$key}}"
                                                value="{{ $option['value'] }}"
                                            >
                                            {{ $option['text'] }}
                                        </label>
                                         @endforeach
                                          @error('howMuchTime')
                                            <p class="mt-1 text-xs text-red-600 dark:text-red-500">{{ $errors->first('howMuchTime') }}</p>
                                         @enderror
                                     </div>
                                </div>
                                
                                </div>  
                                <div class="col-span-12">
                                    <x-forms.textarea 
                                        :label="__('messages.enter_t_field_3_new')"
                                        placeholder="الإجابة"
                                        icon="format-text"
                                        model="experience" />
                                </div>
                                <div class="col-span-12">
                                    <x-forms.textarea 
                                        :label="__('messages.enter_t_field_4_new')"
                                        placeholder="الإجابة"
                                        icon="format-text"
                                        model="marketingExperience" />
                                </div>
                                <div class="col-span-12">                       8 (كم عدد روّاد الأعمال غير التقنيّن (الذين لديهم فكرة
واعدة ولكنهم يواجهون صعوبة في إيجاد الفريق أو
المؤسس التقني المناسب) الذين تعرفهم؟   
                                </div>  
                                <div class="col-span-12">
                                    <x-forms.textarea 
                                        :label="__('messages.t_dot')"
                                        :placeholder="__('messages.enter_t_web_new')"
                                        icon="format-text"
                                        model="enterprenorsCount" />
                                </div>
                                <div class="col-span-12">                       كم عدد العملاء الذين تعرفهم (لديك المعلومات الخاصة
بهم والقدرة على التفاوض معهم لبيع خدمة أو أكثر في
منصة إسناد الأعمال)؟

                                <div class="col-span-12 md:col-span-6">
                                    <div class="w-full" wire:ignore>
                                        @php 
                                         $options = [ 
                                            [
                                            'text' => '  أكثر من 20 ساعة', 
                                            'value' => ' أكثر من 20 ساعة '
                                            ],
                                            [
                                            'text' => '  10 - 20 ساعة ', 
                                            'value' => '  10 - 20 ساعة'
                                            ],
                                            [
                                            'text' => '  5 - 10 ساعة ', 
                                            'value' => '  5 - 10 ساعة'
                                            ],
                                            [
                                            'text' => 'أقل من 5 ساعات ', 
                                            'value' => 'أقل من 5 ساعات'
                                            ],
                                            
                                            ];
                                        @endphp
                                        
                                        <select wire:model="clientsCount" class="mt-2 w-full border-gray-300 rounded" >
                                            @foreach($options as $key=>$option)
                                                <option value="{{ $option['value'] }}">{{ $option['text'] }}</option>
                                            @endforeach
                                        </select>
                                        @error('clientsCount')
                                            <p class="mt-1 text-xs text-red-600 dark:text-red-500">{{ $errors->first('clientsCount') }}</p>
                                         @enderror
                                    </div>
                                </div>
                                </div>  
                                <div class="col-span-12">
                                    <x-forms.textarea 
                                        :label="__('messages.t_dot')"
                                        :placeholder="__('messages.enter_t_web_new')"
                                        icon="format-text"
                                        model="clientsCountExplain" />
                                </div>
<!--                                <div class="col-span-12">                       8 (كم عدد روّاد الأعمال غير التقنيّن (الذين لديهم فكرة-->
<!--واعدة ولكنهم يواجهون صعوبة في إيجاد الفريق أو-->
<!--المؤسس التقني المناسب) الذين تعرفهم؟   -->
<!--                                </div>  -->
<!--                                <div class="col-span-12">-->
<!--                                    <x-forms.textarea -->
<!--                                        :label="__('messages.t_dot')"-->
<!--                                        :placeholder="__('messages.enter_t_web_new')"-->
<!--                                        icon="format-text"-->
<!--                                        model="field_8" />-->
<!--                                </div>-->
                                {{-- reCaptcha --}}
                                @if (settings('security')->is_recaptcha)
                                    <div class="col-span-12">
                                        <x-honey recaptcha/>
                                    </div>
                                @endif
                                <div class="col-span-12">
                                    بتقديمي لهذا النموذج فإنني أُوافق على الشروط والأحكام
وسياسة الخصوصية وأتعهد بصحة المعلومات المقدمة
                                </div>
                                {{-- Submit --}}
                                <div class="col-span-12 mt-6">
                                    <x-forms.button action="send" :text="__('messages.t_lets_talk')" :block="true" />
                                </div>
                
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        $(document).ready(function () {
            // $('#select2').select2();
            // $('#select2-id-field_1').on('change', function (e) {
            //     var data = $('#select2').select2("val");
            //     alert(data);
            // @this.set('selected', data);
            // $('select').select2();
            
            // $('select').on('change', function (e) {
            //     @this.set('selectedItems', e.target.value);
            // });
            
            // });
        });
        
    </script>

@endpush
