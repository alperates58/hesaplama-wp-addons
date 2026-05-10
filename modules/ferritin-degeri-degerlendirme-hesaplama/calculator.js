function hcFerritinHesapla() {
    const val = parseFloat(document.getElementById('hc-fe-val').value);
    const gender = document.getElementById('hc-fe-gender').value;

    if (isNaN(val)) return;

    let res = "", desc = "";

    if (val < 15) {
        res = "Demir Eksikliği";
        desc = "Depolar tamamen boşalmış.";
    } else if (val < 30) {
        res = "Düşük Depo";
        desc = "Demir eksikliği riski yüksek.";
    } else {
        const max = (gender === 'male' ? 300 : 200);
        if (val > max) {
            res = "Yüksek Ferritin";
            desc = "Enflamasyon veya demir yüklenmesi olabilir.";
        } else {
            res = "Normal";
            desc = "Demir depoları yeterli aralıkta.";
        }
    }

    document.getElementById('hc-fe-res').innerText = res;
    document.getElementById('hc-fe-desc').innerText = desc;
    document.getElementById('hc-fe-result').classList.add('visible');
}
