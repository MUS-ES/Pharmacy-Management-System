<div class="new-supplier">
    <div class="popup-overlay"></div>
    <div class="popup-container">
        <div class="header">
            <h3>New Supplier</h3>
            <span onclick="closePopup('.new-supplier')" class="cancel-btn material-icons-outlined">highlight_off</span>
        </div>
        <div class="body">

            <div class="input-container">
                <div class="input-header-container">
                    <label for="">Supplier Name</label>
                </div>
                <input id="popup-new-supplier-name" type="text">
                <span class="invalid-feedback"></span>
            </div>

            <div class="input-container">
                <div class="input-header-container">
                    <label for="">Email</label>
                </div>
                <input id="popup-new-supplier-email" type="text">
                <span class="invalid-feedback"></span>
            </div>

            <div class="input-container">
                <div class="input-header-container">
                    <label for="">Contact</label>
                </div>
                <input id="popup-new-supplier-contact" type="text">
                <span class="invalid-feedback"></span>
            </div>
            <div class="input-container">
                <div class="input-header-container">
                    <label for="">Address</label>
                </div>
                <input id="popup-new-supplier-address" type="text">
                <span class="invalid-feedback"></span>
            </div>


            <div class="popup-btn">
                <button onclick="saveSupplier()" id="popup-new-supplier-btn" type="button" name="button"><span
                        style="font-size:30px" class="material-icons-outlined">
                        add_circle_outline
                    </span></button>
            </div>

        </div>
    </div>
</div>
