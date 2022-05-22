<div class="new-medicine">
    <div class="popup-overlay"></div>
    <div class="popup-container">
        <div class="header">
            <h3>New Medicine</h3>
            <span onclick="closePopup('.new-medicine')" class="cancel-btn material-icons-outlined">highlight_off</span>
        </div>
        <div class="body">

            <div class="input-container">
                <div class="input-header-container">
                    <label for="">Medicine Name</label>
                </div>
                <input id="popup-new-medicine-name" type="text">
                <span class="invalid-feedback"></span>
            </div>

            <div class="input-container">
                <div class="input-header-container">
                    <label for="">Generic Name</label>
                </div>
                <input id="popup-new-medicine-generic" type="text">
                <span class="invalid-feedback"></span>
            </div>

            <div class="input-container merge two">
                <div class="input-header-container">
                    <label for="">Strip</label>
                </div>
                <input id="popup-new-medicine-strip" type="number">
                <span class="invalid-feedback"></span>
            </div>
            <div class="input-container merge two">
                <div class="input-header-container">
                    <label for="">Price</label>
                </div>
                <input id="popup-new-medicine-price" type="number">
                <span class="invalid-feedback"></span>
            </div>
            <div class="input-container">
                <div class="input-header-container">
                    <label for="">Description</label>
                </div>
                <textarea id="popup-new-medicine-description" cols="20" rows="5"></textarea>
                <span class="invalid-feedback"></span>
            </div>


            <div class="popup-btn">
                <button onclick="saveMedicine()" id="popup-new-customer-btn" type="button" name="button"><span
                        style="font-size:30px" class="material-icons-outlined">
                        add_circle_outline
                    </span></button>
            </div>

        </div>
    </div>
</div>
