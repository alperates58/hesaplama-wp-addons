function hcGKSHesapla() {
    const e = parseInt(document.getElementById('hc-gcs-e').value);
    const v = parseInt(document.getElementById('hc-gcs-v').value);
    const m = parseInt(document.getElementById('hc-gcs-m').value);

    const total = e + v + m;

    document.getElementById('hc-gcs-val').innerText = 'GKS ' + total + ' (E' + e + ' V' + v + ' M' + m + ')';
    
    let desc = "";
    if (total >= 13) desc = "Hafif Beyin Hasarı / Normal";
    else if (total >= 9) desc = "Orta Beyin Hasarı";
    else desc = "⚠️ Ağır Beyin Hasarı / Koma";

    document.getElementById('hc-gcs-desc').innerText = desc;
    document.getElementById('hc-gcs-result').classList.add('visible');
}
