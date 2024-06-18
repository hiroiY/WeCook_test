@vite(['resources/css/myrecipe_tab.scss'])

<div class="tab-content">
            {{-- <div class="container"> --}}
                <div class="d-flex justify-content-evenly">
                    <div class="card-vertical" style="padding-top: 10px;">
                        <div id="photo1" class="tab-pane active">
                            <div class="card mb-3">
                                <div class="container-fluid" id="container">
                                    <div class="header d-flex justify-content-between align-items-center" style="padding-top: 10px;">
                                        <div>
                                            <p class="card-title fw-bold">Appetizer1</p>
                                        </div>
                                        <div>
                                            <i class="edit-icon fa-solid fa-pen" style="font-size: 30px; margin-right: 5px;"></i>
                                        </div>                                                        
                                    </div>
                                    <div class="" style="width: 420px; margin-right: 5px;">
                                        <img src="{{ asset('../images/appetizer/appetizer1.jpg') }}" alt="Tomato Rice" class="" style="width: 420px; margin-left: 2.5px;"/>
                                    </div>
                                    <div class="footer d-flex justify-content-between align-items-center" style="margin-top: 15px; margin-bottom: 20px;">
                                        <div>
                                            <i class="comment-icon fa-regular fa-comments" style="font-size: 30px; margin-left: 5px;"></i>
                                            <span class="comment-text fw-bold" style="margin-left: 5px;">11</span>
                                        </div>
                                        <div>
                                            <i class="bookmark-icon fa-regular fa-bookmark" style="font-size: 30px;"></i>
                                            <span class="bookmark-text fw-bold" style="margin-right: 5px;">40</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="photo2" class="tab-pane active" style="padding-top: 10px">
                            <div class="card mb-3">
                                <div class="container-fluid" id="container">
                                    <div class="header d-flex justify-content-between align-items-center" style="padding-top: 10px;">
                                        <div>
                                            <p class="card-title fw-bold">Appetizer2</p>
                                        </div>
                                        <div>
                                            <i class="edit-icon fa-solid fa-pen" style="font-size: 30px; margin-right: 5px;"></i>
                                        </div>                                                        
                                    </div>
                                    <div class="" style="width: 420px; margin-right: 5px;">
                                        <img src="{{ asset('../images/appetizer/appetizer2.jpg') }}" alt="Tomato Rice" class="" style="width: 420px; margin-left: 2.5px;"/>
                                    </div>
                                    <div class="footer d-flex justify-content-between align-items-center" style="margin-top: 15px; margin-bottom: 20px;">
                                        <div>
                                            <i class="comment-icon fa-regular fa-comments" style="font-size: 30px; margin-left: 5px;"></i>
                                            <span class="comment-text fw-bold" style="margin-left: 5px;">11</span>
                                        </div>
                                        <div>
                                            <i class="bookmark-icon fa-regular fa-bookmark" style="font-size: 30px;"></i>
                                            <span class="bookmark-text fw-bold" style="margin-right: 5px;">40</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="padding-top: 10px">
                        <div id="photo3" class="tab-pane active">
                            <div class="card mb-3">
                                <div class="container-fluid" id="container">
                                    <div class="header d-flex justify-content-between align-items-center" style="padding-top: 10px;">
                                        <div>
                                            <p class="card-title fw-bold">Appetizer3</p>
                                        </div>
                                        <div>
                                            <i class="edit-icon fa-solid fa-pen" style="font-size: 30px; margin-right: 5px;"></i>
                                        </div>                                                        
                                    </div>
                                    <div class="" style="width: 420px; margin-right: 5px;">
                                        <img src="{{ asset('../images/appetizer/appetizer3.jpeg') }}" alt="Tomato Rice" class="" style="width: 420px; margin-left: 2.5px;"/>
                                    </div>
                                    <div class="footer d-flex justify-content-between align-items-center" style="margin-top: 15px; margin-bottom: 20px;">
                                        <div>
                                            <i class="comment-icon fa-regular fa-comments" style="font-size: 30px; margin-left: 5px;"></i>
                                            <span class="comment-text fw-bold" style="margin-left: 5px;">11</span>
                                        </div>
                                        <div>
                                            <i class="bookmark-icon fa-regular fa-bookmark" style="font-size: 30px;"></i>
                                            <span class="bookmark-text fw-bold" style="margin-right: 5px;">40</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="photo4" class="tab-pane active" style="padding-top: 10px">
                            <div class="card mb-3">
                                <div class="container-fluid" id="container">
                                    <div class="header d-flex justify-content-between align-items-center" style="padding-top: 10px;">
                                        <div>
                                            <p class="card-title fw-bold">Appetizer4</p>
                                        </div>
                                        <div>
                                            <i class="edit-icon fa-solid fa-pen" style="font-size: 30px; margin-right: 5px;"></i>
                                        </div>                                                        
                                    </div>
                                    <div class="" style="width: 420px; margin-right: 5px;">
                                        <img src="{{ asset('../images/appetizer/appetizer4.jpg') }}" alt="Tomato Rice" class="" style="width: 420px; margin-left: 2.5px;"/>
                                    </div>
                                    <div class="footer d-flex justify-content-between align-items-center" style="margin-top: 15px; margin-bottom: 20px;">
                                        <div>
                                            <i class="comment-icon fa-regular fa-comments" style="font-size: 30px; margin-left: 5px;"></i>
                                            <span class="comment-text fw-bold" style="margin-left: 5px;">11</span>
                                        </div>
                                        <div>
                                            <i class="bookmark-icon fa-regular fa-bookmark" style="font-size: 30px;"></i>
                                            <span class="bookmark-text fw-bold" style="margin-right: 5px;">40</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {{-- </div> --}}
        </div>