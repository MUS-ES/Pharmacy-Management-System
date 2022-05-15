<div class="feedback">
    <div class="feedback-container">
        <div class="body">
            <div class="title">
                <span style="color:green; font-size:110px" class="material-icons-outlined">
                    task_alt
                </span>
                <h3>Success</h3>
            </div>
            <button id="feedback-btn-done" style="left:0;font-size:15px; font-weight:bolder" id="popup-button"
                type="button" name="button">DONE</button>
        </div>
    </div>
</div>
<script>
    let feedback_btn = document.getElementById("feedback-btn-done");
    feedback_btn.onclick = function() {
        let feedbackEle = document.querySelector(".feedback.active");
        feedbackEle.classList.remove("active");
    };
</script>
