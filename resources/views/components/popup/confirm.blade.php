<div class="confirm">
    <div class="popup-overlay"></div>
    <div class="popup-container">
        <div class="body">
            <div class="title">
                <span class="material-icons-outlined">
                    help_outline
                </span>
                <h3> {{ $msg }}</h3>
            </div>
            <div class="buttons-container">
                <button id="confirm-btn" type="submit">Yes</button>

                <button onclick="closePopup('.confirm')" id="ignore-btn" name="button">No</button>
                </form>
            </div>
        </div>
    </div>
</div>
