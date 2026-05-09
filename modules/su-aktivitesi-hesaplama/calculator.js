function hcWaterActivityHesapla() {
    const erh = parseFloat(document.getElementById('hc-wa-erh').value) || 0;

    const aw = erh / 100;
    
    let comment = "";
    if (aw > 0.91) comment = "Bakteriyel gelişim riski yüksek.";
    else if (aw > 0.80) comment = "Küf ve maya gelişimi görülebilir.";
    else if (aw > 0.60) comment = "Mikrobiyal gelişim durur, ancak kimyasal reaksiyonlar devam edebilir.";
    else comment = "Mikrobiyal açıdan oldukça güvenli.";

    document.getElementById('hc-res-wa-val').innerText = aw.toLocaleString('tr-TR', { minimumFractionDigits: 3 });
    document.getElementById('hc-res-wa-comment').innerText = comment;
    document.getElementById('hc-water-activity-result').classList.add('visible');
}
