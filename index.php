<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/quill.base.css">
        <link rel="stylesheet" href="css/quill.snow.css">
        <link rel="stylesheet" href="css/custom.css">
        <link rel="stylesheet" href="https://fortawesome.github.io/Font-Awesome/assets/font-awesome/css/font-awesome.css">
        <script type="text/javascript" src="js/jquery-1.11.4.min.js"></script>
        <script type="text/javascript" src="js/bootstrap3.3.2.min.js"></script>
        <script src="js/read-along.js"></script>
        <script src="js/main.js"></script>
        <script src="//cdn.quilljs.com/0.20.0/quill.js"></script>
    </head>
    <body>
        <header id="navigation-container" class="navbar">
            <div class="container">
                <div class="navbar-header">
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/" title="Quill">
                        <span>Karaoke</span>
                    </a>
                </div>
            </div>
        </header>
        <div id="demo-container">
            <div class="modal fade bs-example-modal-sm" id="pasteToEditor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                         <div class="modal-body">
                            <h4 class="modal-title" id="myModalLabel">You have succesfuly copy all the text! Now press Paste in your favorite editor</h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="player-wrapper">
                <p class="loading">
                    <em><img src="loader.gif" alt="Initializing audio"> Loading audio…</em>
                </p>
                <div class="passage-audio" hidden>
                    <audio id="passage-audio" class="passage" controls>
                        <!-- @todo WebM? -->
                        <source src="audio/Luke.2.1-Luke.2.20.mp3" type="audio/mp3">

                        <em class="error"><strong>Error:</strong> Your browser does not appear to support HTML5 Audio.</em>
                    </audio>
                </div>
                <p class="passage-audio-unavailable" hidden>
                    <em class="error"><strong>Error:</strong> You will not be able to do the read-along audio because your browser is not able to play MP3, Ogg, or WAV audio formats.</em>
                </p>
                <div class="playback-rate" hidden title="Note that increaseing the reading rate will decrease accuracy of word highlights">
                    <!--<label for="playback-rate">Reading rate:</label>-->
                    <span class="reading-rate"><i class="fa fa-dashboard"></i></span>
                    <!--<span class="reading-rate"><i class="fa fa-clock-o"></i></span>-->
                    <input id="playback-rate" type="range" min="0.5" max="2.0" value="1.0" step="0.1" disabled onchange='this.nextElementSibling.textContent = String(Math.round(this.valueAsNumber * 10) / 10) + "\u00D7";'>
                    <output>1&times;</output>
                </div>
                <p class="playback-rate-unavailable" hidden>
                    <em>(It seems your browser does not support <code>HTMLMediaElement.playbackRate</code>, so you will not be able to change the speech rate.)</em>
                </p>
                <div class="autofocus-current-word hidden" >
                    <input type="checkbox" id="autofocus-current-word" checked>
                    <label for="autofocus-current-word">Auto-focus/auto-scroll</label>
                </div>
                <noscript>
                <p class="error"><em><strong>Notice:</strong> You must have JavaScript enabled/available to try this HTML5 Audio read along.</em></p>
                </noscript>
                
                </div>
                <div class="quill-wrapper" data-toggle="tooltip" data-placement="left" title="" data-original-title="Try me out!">
                    
                <div id="toolbar" class="toolbar ql-toolbar ql-snow">
                    <span class="ql-format-group">
                        <select title="Font" class="ql-font">
                            <option value="sans-serif" selected="">Sans Serif</option>
                            <option value="serif">Serif</option>
                            <option value="monospace">Monospace</option>
                        </select>
                        <select title="Size" class="ql-size">
                            <option value="10px">Small</option>
                            <option value="13px" selected="">Normal</option>
                            <option value="18px">Large</option>
                            <option value="32px">Huge</option>
                        </select>
                    </span>
                    <span class="ql-format-group">
                        <span title="Bold" class="ql-format-button ql-bold"></span>
                        <span class="ql-format-separator"></span>
                        <span title="Italic" class="ql-format-button ql-italic"></span>
                        <span class="ql-format-separator"></span>
                        <span title="Underline" class="ql-format-button ql-underline"></span>
                        <span class="ql-format-separator"></span>
                        <span title="Strikethrough" class="ql-format-button ql-strike"></span>
                    </span>
                    <span class="ql-format-group">
                        <select title="Text Color" class="ql-color">
                            <option value="rgb(0, 0, 0)" label="rgb(0, 0, 0)" selected=""></option>
                            <option value="rgb(230, 0, 0)" label="rgb(230, 0, 0)"></option>
                            <option value="rgb(255, 153, 0)" label="rgb(255, 153, 0)"></option>
                            <option value="rgb(255, 255, 0)" label="rgb(255, 255, 0)"></option>
                            <option value="rgb(0, 138, 0)" label="rgb(0, 138, 0)"></option>
                            <option value="rgb(0, 102, 204)" label="rgb(0, 102, 204)"></option>
                            <option value="rgb(153, 51, 255)" label="rgb(153, 51, 255)"></option>
                            <option value="rgb(255, 255, 255)" label="rgb(255, 255, 255)"></option>
                            <option value="rgb(250, 204, 204)" label="rgb(250, 204, 204)"></option>
                            <option value="rgb(255, 235, 204)" label="rgb(255, 235, 204)"></option>
                            <option value="rgb(255, 255, 204)" label="rgb(255, 255, 204)"></option>
                            <option value="rgb(204, 232, 204)" label="rgb(204, 232, 204)"></option>
                            <option value="rgb(204, 224, 245)" label="rgb(204, 224, 245)"></option>
                            <option value="rgb(235, 214, 255)" label="rgb(235, 214, 255)"></option>
                            <option value="rgb(187, 187, 187)" label="rgb(187, 187, 187)"></option>
                            <option value="rgb(240, 102, 102)" label="rgb(240, 102, 102)"></option>
                            <option value="rgb(255, 194, 102)" label="rgb(255, 194, 102)"></option>
                            <option value="rgb(255, 255, 102)" label="rgb(255, 255, 102)"></option>
                            <option value="rgb(102, 185, 102)" label="rgb(102, 185, 102)"></option>
                            <option value="rgb(102, 163, 224)" label="rgb(102, 163, 224)"></option>
                            <option value="rgb(194, 133, 255)" label="rgb(194, 133, 255)"></option>
                            <option value="rgb(136, 136, 136)" label="rgb(136, 136, 136)"></option>
                            <option value="rgb(161, 0, 0)" label="rgb(161, 0, 0)"></option>
                            <option value="rgb(178, 107, 0)" label="rgb(178, 107, 0)"></option>
                            <option value="rgb(178, 178, 0)" label="rgb(178, 178, 0)"></option>
                            <option value="rgb(0, 97, 0)" label="rgb(0, 97, 0)"></option>
                            <option value="rgb(0, 71, 178)" label="rgb(0, 71, 178)"></option>
                            <option value="rgb(107, 36, 178)" label="rgb(107, 36, 178)"></option>
                            <option value="rgb(68, 68, 68)" label="rgb(68, 68, 68)"></option>
                            <option value="rgb(92, 0, 0)" label="rgb(92, 0, 0)"></option>
                            <option value="rgb(102, 61, 0)" label="rgb(102, 61, 0)"></option>
                            <option value="rgb(102, 102, 0)" label="rgb(102, 102, 0)"></option>
                            <option value="rgb(0, 55, 0)" label="rgb(0, 55, 0)"></option>
                            <option value="rgb(0, 41, 102)" label="rgb(0, 41, 102)"></option>
                            <option value="rgb(61, 20, 102)" label="rgb(61, 20, 102)"></option>
                        </select>
                        <select title="Background Color" class="ql-background">
                            <option value="rgb(0, 0, 0)" label="rgb(0, 0, 0)"></option>
                            <option value="rgb(230, 0, 0)" label="rgb(230, 0, 0)"></option>
                            <option value="rgb(255, 153, 0)" label="rgb(255, 153, 0)"></option>
                            <option value="rgb(255, 255, 0)" label="rgb(255, 255, 0)"></option>
                            <option value="rgb(0, 138, 0)" label="rgb(0, 138, 0)"></option>
                            <option value="rgb(0, 102, 204)" label="rgb(0, 102, 204)"></option>
                            <option value="rgb(153, 51, 255)" label="rgb(153, 51, 255)"></option>
                            <option value="rgb(255, 255, 255)" label="rgb(255, 255, 255)" selected=""></option>
                            <option value="rgb(250, 204, 204)" label="rgb(250, 204, 204)"></option>
                            <option value="rgb(255, 235, 204)" label="rgb(255, 235, 204)"></option>
                            <option value="rgb(255, 255, 204)" label="rgb(255, 255, 204)"></option>
                            <option value="rgb(204, 232, 204)" label="rgb(204, 232, 204)"></option>
                            <option value="rgb(204, 224, 245)" label="rgb(204, 224, 245)"></option>
                            <option value="rgb(235, 214, 255)" label="rgb(235, 214, 255)"></option>
                            <option value="rgb(187, 187, 187)" label="rgb(187, 187, 187)"></option>
                            <option value="rgb(240, 102, 102)" label="rgb(240, 102, 102)"></option>
                            <option value="rgb(255, 194, 102)" label="rgb(255, 194, 102)"></option>
                            <option value="rgb(255, 255, 102)" label="rgb(255, 255, 102)"></option>
                            <option value="rgb(102, 185, 102)" label="rgb(102, 185, 102)"></option>
                            <option value="rgb(102, 163, 224)" label="rgb(102, 163, 224)"></option>
                            <option value="rgb(194, 133, 255)" label="rgb(194, 133, 255)"></option>
                            <option value="rgb(136, 136, 136)" label="rgb(136, 136, 136)"></option>
                            <option value="rgb(161, 0, 0)" label="rgb(161, 0, 0)"></option>
                            <option value="rgb(178, 107, 0)" label="rgb(178, 107, 0)"></option>
                            <option value="rgb(178, 178, 0)" label="rgb(178, 178, 0)"></option>
                            <option value="rgb(0, 97, 0)" label="rgb(0, 97, 0)"></option>
                            <option value="rgb(0, 71, 178)" label="rgb(0, 71, 178)"></option>
                            <option value="rgb(107, 36, 178)" label="rgb(107, 36, 178)"></option>
                            <option value="rgb(68, 68, 68)" label="rgb(68, 68, 68)"></option>
                            <option value="rgb(92, 0, 0)" label="rgb(92, 0, 0)"></option>
                            <option value="rgb(102, 61, 0)" label="rgb(102, 61, 0)"></option>
                            <option value="rgb(102, 102, 0)" label="rgb(102, 102, 0)"></option>
                            <option value="rgb(0, 55, 0)" label="rgb(0, 55, 0)"></option>
                            <option value="rgb(0, 41, 102)" label="rgb(0, 41, 102)"></option>
                            <option value="rgb(61, 20, 102)" label="rgb(61, 20, 102)"></option>
                        </select>
                    </span>
                    <span class="ql-format-group"><span title="List" class="ql-format-button ql-list"></span>
                        <span class="ql-format-separator"></span>
                        <span title="Bullet" class="ql-format-button ql-bullet"></span>
                        <span class="ql-format-separator"></span>
                        <select title="Text Alignment" class="ql-align">
                            <option value="left" label="Left" selected=""></option>
                            <option value="center" label="Center"></option>
                            <option value="right" label="Right"></option>
                            <option value="justify" label="Justify"></option>
                        </select>
                    </span>
                    <span class="ql-format-group">
                        <span title="Download" class="ql-format-button download">
                            <i class="fa fa-download fa-lg"></i>
                        </span>
                        <span class="ql-format-separator"></span>
                        <span onclick="copyToClipboard('#passage-text')" title="Copy to Clipboard" class="ql-format-button copy">
                            <i class="fa fa-clipboard"></i>
                        </span>
                    </span>
                </div>
                <div id="editor">
                    <div id="passage-text" class="passage">
                    </div>
                </div>
            </div>
        </div>
        <script src="js/FileSaver.js"></script>
        <script src="js/jquery.wordexport.js"></script>
        <script type="text/javascript">
                 $(document).ready(function() {
                     $.ajax({
                         url: 'audio/Luke.2.1-Luke.2.20.csv.json',
                         type: "GET",
                         contentType: "application/json",
                         dataType: 'JSON',
                         success: function(data) {
                             var newHTML = '';
                             for (var element in data) {
                                 var i = 0;
                                 var word = data[element][0];
                                 var begin = data[element][1];
                                 var duration = data[element][2];
                                 newHTML += '<span data-dur="' + duration + '" data-begin="' + begin + '" tabindex="0" data-index="' + i + '" class="">' + word + '</span><span> </span>';
                                 i++;
                             }
                             $('#passage-text').html(newHTML);
                             return false;
                         },
                         error: function() {
                             console.log('Fail to get the hierarchy... ')
                         }
                     });
              var editor = new Quill('#editor', { theme: 'snow' });
              editor.addModule('toolbar', {
                container: '#toolbar'     // Selector for toolbar container
              });
                           });
                $(".download").click(function(event) {
                $("#editor").wordExport();
                });
                
                function copyToClipboard() 
                {
                    this.document.execCommand("SelectAll", true); 
                    this.document.execCommand("Copy", true); 
                    this.document.execCommand("UnSelect", true); 
                    $('#pasteToEditor').modal('show');
                }

        </script>
    </body>
</html>
