<div class="feedback">
    <div class="popup-overlay"></div>
    <div class="feedback-container">
        <div class="body">
            <div class="title">
                <span style="color:green; font-size:110px" class="material-icons-outlined">
                    task_alt
                </span>
                <h3> {{ $msg }}</h3>
            </div>
            <button onclick="closePopup('.feedback',true)" id="feedback-btn-done"
                style="left:0;font-size:15px; font-weight:bolder" id="popup-button" type="button"
                name="button">DONE</button>
        </div>
    </div>
</div>
