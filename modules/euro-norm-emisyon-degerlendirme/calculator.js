function hcEnHesapla() {
    const year = parseInt(document.getElementById('hc-en-year').value);

    if (isNaN(year)) {
        alert('Lütfen yılı girin.');
        return;
    }

    let norm = "";
    let details = "";

    if (year >= 2025) { norm = "Euro 7"; details = "En sıkı emisyon limitleri. NOx ve partikül madde salınımı minimize edilmiştir."; }
    else if (year >= 2021) { norm = "Euro 6d / 6e"; details = "Gerçek sürüş emisyonları (RDE) odaklı gelişmiş standart."; }
    else if (year >= 2014) { norm = "Euro 6"; details = "Dizel araçlarda AdBlue kullanımı ve NOx filtreleri standart hale geldi."; }
    else if (year >= 2009) { norm = "Euro 5"; details = "Dizel partikül filtresi (DPF) zorunluluğu başladı."; }
    else if (year >= 2005) { norm = "Euro 4"; details = "Emisyon değerlerinde büyük düşüş sağlandı."; }
    else if (year >= 2000) { norm = "Euro 3"; details = "Isınma süresi emisyonları dahil edildi."; }
    else if (year >= 1996) { norm = "Euro 2"; details = "Karbon monoksit ve HC+NOx limitleri düşürüldü."; }
    else if (year >= 1992) { norm = "Euro 1"; details = "Katalitik konvertör zorunluluğu başladı."; }
    else { norm = "Pre-Euro"; details = "Herhangi bir Euro emisyon normuna tabi değildir."; }

    document.getElementById('hc-en-val').innerText = norm;
    document.getElementById('hc-en-details').innerText = details;
    document.getElementById('hc-en-result').classList.add('visible');
}
