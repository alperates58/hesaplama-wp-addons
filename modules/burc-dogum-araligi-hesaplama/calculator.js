function hcBurcDogumAralikHesapla() {
    const birthdate = document.getElementById('hc-bda-birthdate').value;
    if (!birthdate) {
        alert('Lütfen doğum tarihinizi giriniz.');
        return;
    }

    const date = new Date(birthdate);
    const month = date.getMonth() + 1;
    const day = date.getDate();

    const signs = [
        { name: "Koç", range: "21 Mart - 19 Nisan" },
        { name: "Boğa", range: "20 Nisan - 20 Mayıs" },
        { name: "İkizler", range: "21 Mayıs - 20 Haziran" },
        { name: "Yengeç", range: "21 Haziran - 22 Temmuz" },
        { name: "Aslan", range: "23 Temmuz - 22 Ağustos" },
        { name: "Başak", range: "23 Ağustos - 22 Eylül" },
        { name: "Terazi", range: "23 Eylül - 22 Ekim" },
        { name: "Akrep", range: "23 Ekim - 21 Kasım" },
        { name: "Yay", range: "22 Kasım - 21 Aralık" },
        { name: "Oğlak", range: "22 Aralık - 19 Ocak" },
        { name: "Kova", range: "20 Ocak - 18 Şubat" },
        { name: "Balık", range: "19 Şubat - 20 Mart" }
    ];

    let mySign = null;
    if ((month == 3 && day >= 21) || (month == 4 && day <= 19)) mySign = signs[0];
    else if ((month == 4 && day >= 20) || (month == 5 && day <= 20)) mySign = signs[1];
    else if ((month == 5 && day >= 21) || (month == 6 && day <= 20)) mySign = signs[2];
    else if ((month == 6 && day >= 21) || (month == 7 && day <= 22)) mySign = signs[3];
    else if ((month == 7 && day >= 23) || (month == 8 && day <= 22)) mySign = signs[4];
    else if ((month == 8 && day >= 23) || (month == 9 && day <= 22)) mySign = signs[5];
    else if ((month == 9 && day >= 23) || (month == 10 && day <= 22)) mySign = signs[6];
    else if ((month == 10 && day >= 23) || (month == 11 && day <= 21)) mySign = signs[7];
    else if ((month == 11 && day >= 22) || (month == 12 && day <= 21)) mySign = signs[8];
    else if ((month == 12 && day >= 22) || (month == 1 && day <= 19)) mySign = signs[9];
    else if ((month == 1 && day >= 20) || (month == 2 && day <= 18)) mySign = signs[10];
    else mySign = signs[11];

    let detailedDesc = `
        <p><strong>Sizin Aralığınız:</strong> ${mySign.name} (${mySign.range})</p>
        <p><strong>Analiz:</strong> ${mySign.name} burcunun tam ortasında mı yoksa sınırlarında mı doğduğunuz, karakterinizin yoğunluğunu belirler. Sınır günlerinde (ilk veya son 3 gün) doğanlar, komşu burcun özelliklerini de taşıyan 'Cusp' bireyleridir.</p>
        <hr>
        <h4>Tüm Burç Aralıkları:</h4>
        <ul style="list-style: none; padding: 0;">
            ${signs.map(s => `<li style="margin-bottom: 5px; ${s.name === mySign.name ? 'font-weight: bold; color: #e67e22;' : ''}">${s.name}: ${s.range}</li>`).join('')}
        </ul>
        <p style="margin-top: 15px;">2026 yılında burç geçiş tarihleri, Güneş'in hassas boylam derecelerine göre birkaç saatlik kaymalar gösterebilir. Tam sınırda doğduysanız, doğum saatiniz ile detaylı bir harita analizi yapmanız önerilir.</p>
    `;

    document.getElementById('hc-bda-value').innerText = mySign.range;
    document.getElementById('hc-bda-desc').innerHTML = detailedDesc;
    document.getElementById('hc-bda-result').classList.add('visible');
}
