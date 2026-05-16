function hcCinSansliRenkHesapla() {
    const year = parseInt(document.getElementById('hc-clcr-year').value);
    if (!year) {
        alert('Lütfen doğum yılınızı girin.');
        return;
    }

    const animals = ["Fare", "Öküz", "Kaplan", "Tavşan", "Ejderha", "Yılan", "At", "Keçi", "Maymun", "Horoz", "Köpek", "Domuz"];
    let idx = (year - 1900) % 12;
    if (idx < 0) idx += 12;

    const colorData = [
        { name: "Fare", colors: ["Mavi", "Altın Sarısı", "Yeşil"], hex: ["#0000FF", "#FFD700", "#008000"] },
        { name: "Öküz", colors: ["Beyaz", "Sarı", "Yeşil"], hex: ["#FFFFFF", "#FFFF00", "#008000"] },
        { name: "Kaplan", colors: ["Mavi", "Gri", "Turuncu"], hex: ["#0000FF", "#808080", "#FFA500"] },
        { name: "Tavşan", colors: ["Kırmızı", "Pembe", "Mor", "Mavi"], hex: ["#FF0000", "#FFC0CB", "#800080", "#0000FF"] },
        { name: "Ejderha", colors: ["Altın Sarısı", "Gümüş", "Gri Beyaz"], hex: ["#FFD700", "#C0C0C0", "#F5F5F5"] },
        { name: "Yılan", colors: ["Siyah", "Kırmızı", "Sarı"], hex: ["#000000", "#FF0000", "#FFFF00"] },
        { name: "At", colors: ["Sarı", "Yeşil"], hex: ["#FFFF00", "#008000"] },
        { name: "Keçi", colors: ["Kahverengi", "Kırmızı", "Mor"], hex: ["#A52A2A", "#FF0000", "#800080"] },
        { name: "Maymun", colors: ["Beyaz", "Altın Sarısı", "Mavi"], hex: ["#FFFFFF", "#FFD700", "#0000FF"] },
        { name: "Horoz", colors: ["Altın Sarısı", "Kahverengi", "Sarı"], hex: ["#FFD700", "#A52A2A", "#FFFF00"] },
        { name: "Köpek", colors: ["Kırmızı", "Yeşil", "Mor"], hex: ["#FF0000", "#008000", "#800080"] },
        { name: "Domuz", colors: ["Sarı", "Gri", "Kahverengi", "Altın Sarısı"], hex: ["#FFFF00", "#808080", "#A52A2A", "#FFD700"] }
    ];

    const myData = colorData[idx];

    let colorHtml = '';
    myData.hex.forEach(h => {
        colorHtml += `<div class="hc-color-circle" style="background-color: ${h}; border: 1px solid #ddd;"></div>`;
    });

    document.getElementById('hc-clcr-colors').innerHTML = colorHtml;
    document.getElementById('hc-clcr-content').innerText = myData.colors.join(', ');
    document.getElementById('hc-clcr-desc').innerHTML = `<p><strong>${myData.name}</strong> burcu için bu renkler hayat enerjinizi dengelemeye ve çevrenizdeki şans faktörünü artırmaya yardımcı olabilir.</p>`;
    document.getElementById('hc-cin-lucky-color-result').classList.add('visible');
}
