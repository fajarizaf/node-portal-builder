    <style type="text/css">
        .box-upload {
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden
        }

        .box-upload img {
            height: 100%;
            width: 100%;
            object-fit: cover
        }

        .box-file {
            display: none;
        }

        .box-file.active {
            display: block;
        }

    </style>


    <div class="modal modal-blur fade" id="upload-image" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-header" style="background:#efefef">
                    <h5 class="modal-title">Upload Image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body" style="padding:0px;">

                    <div class="box">

                        <button class="btn btnd-none d-sm-inline-block" id="upload-local-komputer" style="margin-left:10px;margin-top:10px;">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-device-desktop-up">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M13.5 16h-9.5a1 1 0 0 1 -1 -1v-10a1 1 0 0 1 1 -1h16a1 1 0 0 1 1 1v7.5" />
                                <path d="M19 22v-6" />
                                <path d="M22 19l-3 -3l-3 3" />
                                <path d="M7 20h5" />
                                <path d="M9 16v4" />
                            </svg>

                            Upload Lokal Komputer
                        </button>
                    </div>
                    <!-- leftbox -->
                    <div class="box-2" style="margin-top:10px;">
                        <div class="result"></div>
                    </div>
                    <!--rightbox-->
                    <div class="img-result hide">
                        <!-- result of crop -->
                        <img class="cropped" src="" alt="">
                    </div>
                    <!-- input file -->
                    <div class="box">
                        <div class="options hide">
                            <input style="display:none" type="number" class="img-w" value="200" min="200" max="400" />
                        </div>
                        <!-- save btn -->
                        <button class="btn save hide" data-bs-dismiss="modal" style="margin-left:10px;margin-bottom:10px;">Save</button>



                    </div>


                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {

            $('#upload-local-komputer').click(function() {
                $('#file-input').click();
            })

        })

    </script>
