@extends('layouts.admin')

@section('title', 'আমার সম্পর্কে ম্যানেজমেন্ট')
@section('page-title', 'আমার সম্পর্কে ম্যানেজমেন্ট')

@section('styles')
<style>
    .content-section {
        background: white;
        border-radius: 15px;
        padding: 2rem;
        margin-bottom: 2rem;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    }
    .content-section h3 {
        color: #1e293b;
        margin-bottom: 1.5rem;
        padding-bottom: 0.75rem;
        border-bottom: 2px solid #e2e8f0;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    .form-group {
        margin-bottom: 1.5rem;
    }
    label {
        display: block;
        margin-bottom: 0.5rem;
        color: #2c3e50;
        font-weight: 600;
    }
    input[type="text"],
    textarea {
        width: 100%;
        padding: 0.75rem;
        border: 2px solid #e2e8f0;
        border-radius: 10px;
        font-family: 'Noto Sans Bengali', sans-serif;
        transition: all 0.3s;
    }
    input:focus,
    textarea:focus {
        outline: none;
        border-color: #667eea;
    }
    textarea {
        min-height: 80px;
        resize: vertical;
    }
    .image-preview {
        width: 150px;
        height: 180px;
        border-radius: 10px;
        overflow: hidden;
        margin-bottom: 1rem;
        border: 2px solid #e2e8f0;
    }
    .image-preview img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .dynamic-item {
        background: #f8fafc;
        padding: 1.5rem;
        border-radius: 10px;
        margin-bottom: 1rem;
        position: relative;
        border: 1px solid #e2e8f0;
    }
    .dynamic-item .remove-btn {
        position: absolute;
        top: 0.5rem;
        right: 0.5rem;
        background: #ef4444;
        color: white;
        border: none;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        cursor: pointer;
    }
    .add-btn {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border: none;
        padding: 0.75rem 1.5rem;
        border-radius: 8px;
        cursor: pointer;
        margin-top: 1rem;
    }
    .add-btn:hover {
        transform: translateY(-2px);
    }
    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
    }
    .save-btn-container {
        text-align: center;
        margin-top: 1rem;
    }
    .tabs {
        display: flex;
        gap: 1rem;
        margin-bottom: 2rem;
    }
    .tab-btn {
        padding: 0.75rem 1.5rem;
        border: 2px solid #e2e8f0;
        background: white;
        border-radius: 10px;
        cursor: pointer;
        font-family: 'Noto Sans Bengali', sans-serif;
        transition: all 0.3s;
    }
    .tab-btn.active {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border-color: transparent;
    }
    .tab-content {
        display: none;
    }
    .tab-content.active {
        display: block;
    }
</style>
@endsection

@section('content')
    <!-- Tabs -->
    <div class="tabs">
        <button class="tab-btn active" onclick="showTab('basic')">
            <i class="fas fa-user"></i> মূল তথ্য
        </button>
        <button class="tab-btn" onclick="showTab('timeline')">
            <i class="fas fa-clock"></i> টাইমলাইন
        </button>
        <button class="tab-btn" onclick="showTab('vision')">
            <i class="fas fa-eye"></i> দৃষ্টিভঙ্গি
        </button>
    </div>

    <!-- Basic Info Tab -->
    <div id="basic-tab" class="tab-content active">
        <form action="{{ route('admin.about.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <!-- Page Header Section -->
            <div class="content-section">
                <h3><i class="fas fa-heading"></i> পেজ হেডার</h3>
                
                <div class="form-group">
                    <label for="page_title">পেজ শিরোনাম</label>
                    <input type="text" id="page_title" name="page_title" 
                        value="{{ $about->page_title }}" placeholder="আমার সম্পর্কে">
                </div>

                <div class="form-group">
                    <label for="page_subtitle">পেজ সাবটাইটেল</label>
                    <textarea id="page_subtitle" name="page_subtitle" 
                        placeholder="জনগণের সেবায় নিবেদিত একজন আদর্শিক রাজনৈতিক নেতা">{{ $about->page_subtitle }}</textarea>
                </div>
            </div>

            <!-- Bio Section -->
            <div class="content-section">
                <h3><i class="fas fa-user-circle"></i> বায়ো সেকশন</h3>
                
                <div class="form-group">
                    <label>প্রোফাইল ছবি</label>
                    @if($about->bio_image)
                    <div class="image-preview">
                        <img src="{{ asset('storage/' . $about->bio_image) }}" alt="Bio Image">
                    </div>
                    @endif
                    <input type="file" name="bio_image" accept="image/*">
                </div>

                <div class="form-group">
                    <label for="bio_title">বায়ো শিরোনাম</label>
                    <input type="text" id="bio_title" name="bio_title" 
                        value="{{ $about->bio_title }}" placeholder="রাজনৈতিক নেতা ও সমাজসেবক">
                </div>

                <div class="form-group">
                    <label for="bio_description_1">বায়ো বিবরণ ১</label>
                    <textarea id="bio_description_1" name="bio_description_1" 
                        placeholder="প্রথম প্যারাগ্রাফ...">{{ $about->bio_description_1 }}</textarea>
                </div>

                <div class="form-group">
                    <label for="bio_description_2">বায়ো বিবরণ ২</label>
                    <textarea id="bio_description_2" name="bio_description_2" 
                        placeholder="দ্বিতীয় প্যারাগ্রাফ...">{{ $about->bio_description_2 }}</textarea>
                </div>
            </div>

            <!-- Info Grid Section -->
            <div class="content-section">
                <h3><i class="fas fa-info-circle"></i> তথ্য গ্রিড</h3>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="full_name">পূর্ণ নাম</label>
                        <input type="text" id="full_name" name="full_name" 
                            value="{{ $about->full_name }}" placeholder="BNP রাজনৈতিক নেতা">
                    </div>

                    <div class="form-group">
                        <label for="party_name">দলের নাম</label>
                        <input type="text" id="party_name" name="party_name" 
                            value="{{ $about->party_name }}" placeholder="বাংলাদেশ জাতীয়তাবাদী দল (BNP)">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="constituency">নির্বাচনী এলাকা</label>
                        <input type="text" id="constituency" name="constituency" 
                            value="{{ $about->constituency }}" placeholder="ঢাকা, বাংলাদেশ">
                    </div>

                    <div class="form-group">
                        <label for="experience">অভিজ্ঞতা</label>
                        <input type="text" id="experience" name="experience" 
                            value="{{ $about->experience }}" placeholder="১০+ বছর জনসেবা">
                    </div>
                </div>
            </div>

            <!-- Quote Section -->
            <div class="content-section">
                <h3><i class="fas fa-quote-left"></i> উক্তি সেকশন</h3>
                
                <div class="form-group">
                    <label for="quote_text">উক্তি টেক্সট</label>
                    <textarea id="quote_text" name="quote_text" 
                        placeholder="গণতন্ত্র, ন্যায়বিচার এবং সমান সুযোগ...">{{ $about->quote_text }}</textarea>
                </div>

                <div class="form-group">
                    <label for="quote_author">উক্তির লেখক</label>
                    <input type="text" id="quote_author" name="quote_author" 
                        value="{{ $about->quote_author }}" placeholder="রাজনৈতিক নেতা">
                </div>
            </div>

            <div class="save-btn-container">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> সংরক্ষণ করুন
                </button>
            </div>
        </form>
    </div>

    <!-- Timeline Tab -->
    <div id="timeline-tab" class="tab-content">
        <form action="{{ route('admin.about.timeline') }}" method="POST">
            @csrf
            
            <div class="content-section">
                <h3><i class="fas fa-clock"></i> রাজনৈতিক যাত্রা টাইমলাইন</h3>
                
                <div id="timeline-container">
                    @if($about->timeline_events)
                        @foreach($about->timeline_events as $index => $event)
                        <div class="dynamic-item">
                            <button type="button" class="remove-btn" onclick="removeItem(this)">
                                <i class="fas fa-times"></i>
                            </button>
                            <div class="form-row">
                                <div class="form-group">
                                    <label>সাল</label>
                                    <input type="text" name="timeline_year[]" value="{{ $event['year'] }}" placeholder="২০১০">
                                </div>
                                <div class="form-group">
                                    <label>শিরোনাম</label>
                                    <input type="text" name="timeline_title[]" value="{{ $event['title'] }}" placeholder="ছাত্র রাজনীতিতে যুক্ত">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>বিবরণ</label>
                                <textarea name="timeline_description[]" placeholder="বিস্তারিত বিবরণ...">{{ $event['description'] }}</textarea>
                            </div>
                        </div>
                        @endforeach
                    @endif
                </div>

                <button type="button" class="add-btn" onclick="addTimeline()">
                    <i class="fas fa-plus"></i> নতুন ইভেন্ট যোগ করুন
                </button>
            </div>

            <div class="save-btn-container">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> টাইমলাইন সংরক্ষণ করুন
                </button>
            </div>
        </form>
    </div>

    <!-- Vision Tab -->
    <div id="vision-tab" class="tab-content">
        <form action="{{ route('admin.about.visions') }}" method="POST">
            @csrf
            
            <div class="content-section">
                <h3><i class="fas fa-eye"></i> দৃষ্টিভঙ্গি কার্ড</h3>
                
                <div id="vision-container">
                    @if($about->vision_cards)
                        @foreach($about->vision_cards as $index => $card)
                        <div class="dynamic-item">
                            <button type="button" class="remove-btn" onclick="removeItem(this)">
                                <i class="fas fa-times"></i>
                            </button>
                            <div class="form-group">
                                <label>শিরোনাম</label>
                                <input type="text" name="vision_title[]" value="{{ $card['title'] }}" placeholder="গণতন্ত্র সুরক্ষা">
                            </div>
                            <div class="form-group">
                                <label>বিবরণ</label>
                                <textarea name="vision_description[]" placeholder="বিস্তারিত বিবরণ...">{{ $card['description'] }}</textarea>
                            </div>
                        </div>
                        @endforeach
                    @endif
                </div>

                <button type="button" class="add-btn" onclick="addVision()">
                    <i class="fas fa-plus"></i> নতুন কার্ড যোগ করুন
                </button>
            </div>

            <div class="save-btn-container">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> দৃষ্টিভঙ্গি সংরক্ষণ করুন
                </button>
            </div>
        </form>
    </div>

    <script>
        function showTab(tabName) {
            // Hide all tabs
            document.querySelectorAll('.tab-content').forEach(tab => {
                tab.classList.remove('active');
            });
            document.querySelectorAll('.tab-btn').forEach(btn => {
                btn.classList.remove('active');
            });

            // Show selected tab
            document.getElementById(tabName + '-tab').classList.add('active');
            event.target.classList.add('active');
        }

        function removeItem(btn) {
            btn.parentElement.remove();
        }

        function addTimeline() {
            const container = document.getElementById('timeline-container');
            const html = `
                <div class="dynamic-item">
                    <button type="button" class="remove-btn" onclick="removeItem(this)">
                        <i class="fas fa-times"></i>
                    </button>
                    <div class="form-row">
                        <div class="form-group">
                            <label>সাল</label>
                            <input type="text" name="timeline_year[]" placeholder="২০১০">
                        </div>
                        <div class="form-group">
                            <label>শিরোনাম</label>
                            <input type="text" name="timeline_title[]" placeholder="ছাত্র রাজনীতিতে যুক্ত">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>বিবরণ</label>
                        <textarea name="timeline_description[]" placeholder="বিস্তারিত বিবরণ..."></textarea>
                    </div>
                </div>
            `;
            container.insertAdjacentHTML('beforeend', html);
        }

        function addVision() {
            const container = document.getElementById('vision-container');
            const html = `
                <div class="dynamic-item">
                    <button type="button" class="remove-btn" onclick="removeItem(this)">
                        <i class="fas fa-times"></i>
                    </button>
                    <div class="form-group">
                        <label>শিরোনাম</label>
                        <input type="text" name="vision_title[]" placeholder="গণতন্ত্র সুরক্ষা">
                    </div>
                    <div class="form-group">
                        <label>বিবরণ</label>
                        <textarea name="vision_description[]" placeholder="বিস্তারিত বিবরণ..."></textarea>
                    </div>
                </div>
            `;
            container.insertAdjacentHTML('beforeend', html);
        }
    </script>
@endsection
