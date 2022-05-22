<div class="new-customer">
    <div class="popup-overlay"></div>
    <div class="popup-container">
        <div class="header">
            <h3>New Customer</h3>
            <span onclick="closePopup('.new-customer')" class="cancel-btn material-icons-outlined">highlight_off</span>
        </div>
        <div class="body">

            <div class="input-container">
                <div class="input-header-container">
                    <label for="">Customer Name</label>
                </div>
                <input id="popup-new-customer-name" type="text">
                <span class="invalid-feedback"></span>
            </div>

            <div class="input-container">
                <div class="input-header-container">
                    <label for="">Contact Number</label>
                </div>
                <input id="popup-new-customer-contact" type="text">
                <span class="invalid-feedback"></span>
            </div>

            <div class="input-container">
                <div class="input-header-container">
                    <label for="">Address</label>
                </div>
                <input id="popup-new-customer-address" type="text">
                <span class="invalid-feedback"></span>
            </div>


            <div class="popup-btn">
                <button onclick="saveCustomer()" id="popup-new-customer-btn" type="button" name="button"><span
                        class="material-icons-outlined">person_add</span></button>
            </div>

        </div>
    </div>
</div>
