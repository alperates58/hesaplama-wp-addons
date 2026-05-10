function hcVitalKapasiteHesapla() {
    const tv = parseFloat(document.getElementById('hc-vk-tv').value);
    const irv = parseFloat(document.getElementById('hc-vk-irv').value);
    const erv = parseFloat(document.getElementById('hc-vk-erv').value);

    if (isNaN(tv) || isNaN(irv) || isNaN(erv)) {
        alert('Lütfen tüm hacim değerlerini doldurunuz.');
        return;
    }

    const vc = tv + irv + erv;
    document.getElementById('hc-vk-res-val').innerText = vc.toLocaleString('tr-TR');
    document.getElementById('hc-vital-kapasite-result').classList.add('visible');
}
