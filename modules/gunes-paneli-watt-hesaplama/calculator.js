function hcPanelWattHesapla() {
    const vmp = parseFloat(document.getElementById('hc-sw-vmp').value);
    const imp = parseFloat(document.getElementById('hc-sw-imp').value);

    if (isNaN(vmp) || isNaN(imp)) {
        alert('Lütfen Vmp ve Imp değerlerini girin.');
        return;
    }

    const watt = vmp * imp;

    document.getElementById('hc-res-sw-watt').innerText = watt.toFixed(1) + ' Watt (Wp)';

    document.getElementById('hc-sw-result').classList.add('visible');
}
