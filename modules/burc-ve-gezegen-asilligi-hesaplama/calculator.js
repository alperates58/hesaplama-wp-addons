function hcAsaletHesapla() {
    const planet = document.getElementById('hc-as-planet').value;
    const sign = document.getElementById('hc-as-sign').value;

    const data = {
        "gunes": { dom: ["aslan"], exa: ["koc"], fal: ["terazi"], det: ["kova"] },
        "ay": { dom: ["yengec"], exa: ["boga"], fal: ["akrep"], det: ["oglak"] },
        "merkur": { dom: ["ikizler", "basak"], exa: ["basak"], fal: ["balik"], det: ["yay", "balik"] },
        "venus": { dom: ["boga", "terazi"], exa: ["balik"], fal: ["basak"], det: ["koc", "akrep"] },
        "mars": { dom: ["koc", "akrep"], exa: ["oglak"], fal: ["yengec"], det: ["terazi", "boga"] },
        "jupiter": { dom: ["yay", "balik"], exa: ["yengec"], fal: ["oglak"], det: ["ikizler", "basak"] },
        "saturn": { dom: ["oglak", "kova"], exa: ["terazi"], fal: ["koc"], det: ["yengec", "aslan"] }
    };

    let status = "Peregrin (Nötr)";
    let desc = "Gezegen bu burçta nötr durumdadır. Enerjisini ne çok güçlü ne de çok zayıf bir şekilde sergiler.";

    const p = data[planet];
    if (p.dom.includes(sign)) {
        status = "Yönetici (Domicile)";
        desc = "Gezegen kendi evindedir! En güçlü halindedir ve doğasını en saf, en verimli şekilde sergiler.";
    } else if (p.exa.includes(sign)) {
        status = "Yücelim (Exaltation)";
        desc = "Gezegen burada bir misafir gibi el üstünde tutulur. Yeteneklerini parlatır ve şans getirir.";
    } else if (p.fal.includes(sign)) {
        status = "Düşüş (Fall)";
        desc = "Gezegen burada kendini rahatsız hisseder. Gücünü sergilemekte zorlanır ve enerjisi kısıtlanır.";
    } else if (p.det.includes(sign)) {
        status = "Zararda (Detriment)";
        desc = "Gezegen doğasına aykırı bir yerdedir. İstediği gibi hareket edemez ve enerjisi gölgelenir.";
    }

    const planetNames = { "gunes": "Güneş", "ay": "Ay", "merkur": "Merkür", "venus": "Venüs", "mars": "Mars", "jupiter": "Jüpiter", "saturn": "Satürn" };
    const signNames = { "koc": "Koç", "boga": "Boğa", "ikizler": "İkizler", "yengec": "Yengeç", "aslan": "Aslan", "basak": "Başak", "terazi": "Terazi", "akrep": "Akrep", "yay": "Yay", "oglak": "Oğlak", "kova": "Kova", "balik": "Balık" };

    let detailedContent = `
        <p><strong>Asalet Analizi:</strong> ${planetNames[planet]} gezegeni ${signNames[sign]} burcunda <strong>${status}</strong> konumundadır.</p>
        <p><strong>Enerji Durumu:</strong> ${desc}</p>
        <p><strong>2026 Kadersel Etki:</strong> 2026 yılında ${planetNames[planet]} gezegeninin yapacağı transitler, sizin bu asalet durumunuza göre şekillenecek. Eğer gezegeniniz ${status === 'Yönetici' || status === 'Yücelim' ? 'güçlüyse bu yıl büyük başarılar' : 'zayıfsa bu yıl sabır ve gelişim'} sizi bekliyor. Güçlü gezegenlerinizi birer koz olarak kullanın, zayıf olanları ise disiplinle şifalandırın.</p>
        <p><strong>Tavsiye:</strong> Bir gezegenin asaleti, o hayat alanındaki 'yetkinliğinizi' gösterir. Zayıf asaletlerde o konuyu öğrenmek için daha fazla çaba sarf etmeniz gerekebilir, ancak bu çaba sizi sonunda o konuda usta yapacaktır.</p>
    `;

    document.getElementById('hc-as-value').innerText = status;
    document.getElementById('hc-as-desc').innerHTML = detailedContent;
    document.getElementById('hc-as-result').classList.add('visible');
}
