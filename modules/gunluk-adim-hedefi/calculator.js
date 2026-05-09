function hcAdımHedefiHesapla() {
    const goal = document.getElementById('hc-sg-goal').value;
    const current = document.getElementById('hc-sg-current').value;

    let target = 10000;
    let desc = "";

    if (goal === 'health') {
        target = (current === 'sedentary') ? 7000 : 8000;
        desc = "Genel sağlık standartlarını karşılamak için yeterli bir seviyedir.";
    } else if (goal === 'weightloss') {
        target = 12000;
        desc = "Aktif kalori yakımı sağlayarak kilo verme sürecinizi destekler.";
    } else if (goal === 'maintenance') {
        target = 10000;
        desc = "Metabolizmanızı canlı tutarak kilonuzu korumanıza yardımcı olur.";
    } else if (goal === 'fit') {
        target = 15000;
        desc = "Yüksek fiziksel aktivite seviyesiyle kondisyonunuzu en üst düzeye çıkarır.";
    }

    document.getElementById('hc-sg-value').innerText = target.toLocaleString('tr-TR') + ' Adım';
    document.getElementById('hc-sg-desc').innerText = desc;
    document.getElementById('hc-step-goal-result').classList.add('visible');
}
