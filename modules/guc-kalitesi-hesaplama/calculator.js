function hcPqHesapla() {
    const v1 = parseFloat(document.getElementById('hc-pq-v1').value);
    const v2 = parseFloat(document.getElementById('hc-pq-v2').value);
    const v3 = parseFloat(document.getElementById('hc-pq-v3').value);

    if (isNaN(v1) || isNaN(v2) || isNaN(v3)) {
        alert('Lütfen tüm faz gerilimlerini girin.');
        return;
    }

    const avg = (v1 + v2 + v3) / 3;
    const maxDev = Math.max(Math.abs(v1 - avg), Math.abs(v2 - avg), Math.abs(v3 - avg));
    
    // IEEE formula: (Max Dev from Avg / Avg) * 100
    const unbalance = (maxDev / avg) * 100;

    document.getElementById('hc-pq-res-val').innerText = '%' + unbalance.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    
    let desc = "";
    if (unbalance <= 1) desc = "<span style='color:green;'>Mükemmel Enerji Kalitesi.</span>";
    else if (unbalance <= 3) desc = "<span style='color:#f1c40f;'>Kabul edilebilir dengesizlik.</span>";
    else desc = "<span style='color:red;'>Yüksek Dengesizlik! Ekipmanlar zarar görebilir.</span>";

    document.getElementById('hc-pq-res-desc').innerHTML = desc;
    document.getElementById('hc-pq-result').classList.add('visible');
}
