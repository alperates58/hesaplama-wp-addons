const hcGIData = [
    { name: "Beyaz Ekmek", gi: 75, type: "Yüksek" },
    { name: "Tam Buğday Ekmeği", gi: 50, type: "Düşük" },
    { name: "Beyaz Pirinç", gi: 73, type: "Yüksek" },
    { name: "Bulgur", gi: 48, type: "Düşük" },
    { name: "Yulaf Ezmesi", gi: 55, type: "Düşük" },
    { name: "Makarna (Al dente)", gi: 45, type: "Düşük" },
    { name: "Patates Haşlanmış", gi: 78, type: "Yüksek" },
    { name: "Patates Kızartması", gi: 82, type: "Yüksek" },
    { name: "Mısır", gi: 52, type: "Düşük" },
    { name: "Mercimek", gi: 32, type: "Düşük" },
    { name: "Nohut", gi: 28, type: "Düşük" },
    { name: "Kuru Fasulye", gi: 24, type: "Düşük" },
    { name: "Elma", gi: 36, type: "Düşük" },
    { name: "Muz (Olgun)", gi: 51, type: "Düşük" },
    { name: "Karpuz", gi: 72, type: "Yüksek" },
    { name: "Kavun", gi: 65, type: "Orta" },
    { name: "Üzüm", gi: 59, type: "Orta" },
    { name: "Portakal", gi: 43, type: "Düşük" },
    { name: "Şeftali", gi: 42, type: "Düşük" },
    { name: "Süt", gi: 31, type: "Düşük" },
    { name: "Yoğurt", gi: 33, type: "Düşük" },
    { name: "Dondurma", gi: 51, type: "Düşük" },
    { name: "Bal", gi: 61, type: "Orta" },
    { name: "Toz Şeker (Sakkaroz)", gi: 65, type: "Orta" }
];

function hcGISearch() {
    const query = document.getElementById('hc-gi-query').value.toLowerCase('tr-TR');
    const tbody = document.getElementById('hc-gi-tbody');
    tbody.innerHTML = '';

    hcGIData.filter(item => item.name.toLowerCase('tr-TR').includes(query))
            .forEach(item => {
                const tr = document.createElement('tr');
                let color = '#2e7d32';
                if (item.gi > 69) color = '#c62828';
                else if (item.gi > 55) color = '#ef6c00';

                tr.innerHTML = `
                    <td style="padding: 10px; border-bottom: 1px solid #f5f5f5;">${item.name}</td>
                    <td style="padding: 10px; border-bottom: 1px solid #f5f5f5; text-align: right; font-weight: bold;">${item.gi}</td>
                    <td style="padding: 10px; border-bottom: 1px solid #f5f5f5; text-align: center; color: ${color}; font-weight: bold;">${item.type}</td>
                `;
                tbody.appendChild(tr);
            });
}

// İlk yüklemede hepsini göster
document.addEventListener('DOMContentLoaded', hcGISearch);
// Eğer sayfa çoktan yüklendiyse direkt çağır
if (document.readyState === "complete" || document.readyState === "interactive") {
    hcGISearch();
}
