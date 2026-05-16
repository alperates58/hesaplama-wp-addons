function hcCinSansliGunHesapla() {
    const year = parseInt(document.getElementById('hc-clgy-year').value);
    if (!year) {
        alert('Lütfen doğum yılınızı girin.');
        return;
  }

    const animals = ["Fare", "Öküz", "Kaplan", "Tavşan", "Ejderha", "Yılan", "At", "Keçi", "Maymun", "Horoz", "Köpek", "Domuz"];
    let idx = (year - 1900) % 12;
    if (idx < 0) idx += 12;

    const luckyDays = [
        { name: "Fare", days: "4, 13" },
        { name: "Öküz", days: "13, 27" },
        { name: "Kaplan", days: "16, 27" },
        { name: "Tavşan", days: "26, 27, 29" },
        { name: "Ejderha", days: "1, 16" },
        { name: "Yılan", days: "1, 23" },
        { name: "At", days: "5, 20" },
        { name: "Keçi", days: "7, 30" },
        { name: "Maymun", days: "4, 14" },
        { name: "Horoz", days: "4, 26" },
        { name: "Köpek", days: "7, 28" },
        { name: "Domuz", days: "17, 24" }
    ];

    const myData = luckyDays[idx];

    document.getElementById('hc-clgy-content').innerText = myData.days;
    document.getElementById('hc-clgy-desc').innerHTML = `
        <p><strong>${myData.name}</strong> burcu için her ayın bu günleri (Ay takvimine göre) yeni başlangıçlar ve önemli işler için en uğurlu zamanlardır.</p>
        <p><small>*Bu günler geleneksel Çin Ay Takvimi'ndeki gün sayılarıdır.</small></p>
    `;
    document.getElementById('hc-cin-lucky-day-result').classList.add('visible');
}
