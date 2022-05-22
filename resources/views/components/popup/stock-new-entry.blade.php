<div class="stock-new-entry">
    <div class="popup-overlay"></div>
    <div class="popup-container">
        <div class="header">
            <h3>New Entry</h3>
            <span onclick="closePopup('.stock-new-entry')"
                class="cancel-btn material-icons-outlined">highlight_off</span>
        </div>
        <div class="body">
            <div class="input-container">
                <div class="input-header-container">
                    <label for="">Medicine Name</label>
                    <span onclick="openPopup('/ajax/popup/medicine/add')">+add new</span>
                </div>
                <input id="popup-stock-medicine-name" oninput="autoCompleteMed(this);" type="text">
                <span class="invalid-feedback"></span>
                <ul id="list-medicine" class="list">

                </ul>
                <span class="invalid-feedback"></span>
            </div>
            <div class="input-container merge three">
                <label for="">Mfd</label>
                <input id="popup-stock-mfd" type="date">
                <span class="invalid-feedback"></span>
            </div>
            <div class="input-container merge three">
                <label for="">Exp</label>
                <input id="popup-stock-exp" type="date">
                <span class="invalid-feedback"></span>
            </div>
            <div class="input-container merge three">
                <label for="">Qty</label>
                <input id="popup-stock-qty" type="number">
                <span class="invalid-feedback"></span>
            </div>
            <div class="input-container">
                <div class="input-header-container">
                    <label for="">Supplier Name</label>
                    <span onclick="openPopup('/ajax/popup/supplier/add')">+add new</span>
                </div>
                <input id="popup-stock-supplier" type="text">
                <span class="invalid-feedback"></span>
            </div>
            <button onclick="saveStock()" id="popup-stock-btn"><span style="font-size:30px"
                    class="material-icons-outlined">
                    add_circle_outline
                </span></button>
        </div>
    </div>
</div>
