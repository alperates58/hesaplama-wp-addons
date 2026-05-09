function hcCngHesapla() {
    const km = parseFloat(document.getElementById('hc-cng-km').value);
    const pPrice = parseFloat(document.getElementById('hc-cng-p-price').value);
    const cPrice = parseFloat(document.getElementById('hc-cng-c-price').value);
    const pCons = parseFloat(document.getElementById('hc-cng-cons').value);

    if (isNaN(km) || isNaN(pPrice) || isNaN(cPrice) || isNaN(pCons)) {
        alert('Lütfen tüm değerleri girin.');
        return;
    }

    const cCons = pCons / 1.4; // 1 kg CNG is roughly equivalent to 1.4L petrol
    const mPetrol = (km / 100) * pCons * pPrice;
    const mCng = (km / 100) * cCons * cPrice;
    const saving = mPetrol - mCng;

    document.getElementById('hc-cng-monthly').innerText = Math.round(saving).toLocaleString('tr-TR') + " ₺";
    document.getElementById('hc-cng-yearly').innerText = Math.round(saving * 12).toLocaleString('tr-TR') + " ₺";

    document.getElementById('hc-cng-result').classList.add('visible');
}
