var HC_YAS_UNLULER = {
    '01-08': ['Elvis Presley', 'Stephen Hawking', 'David Bowie'],
    '01-15': ['Martin Luther King Jr.', 'Moliere', 'Drew Brees'],
    '01-17': ['Muhammed Ali', 'Benjamin Franklin', 'Jim Carrey'],
    '01-27': ['Wolfgang Amadeus Mozart', 'Lewis Carroll', 'Mimi Rogers'],
    '02-11': ['Thomas Edison', 'Jennifer Aniston', 'Sheryl Crow'],
    '02-12': ['Abraham Lincoln', 'Charles Darwin', 'Christina Ricci'],
    '02-17': ['Michael Jordan', 'Paris Hilton', 'Ed Sheeran'],
    '02-22': ['George Washington', 'Drew Barrymore', 'Steve Irwin'],
    '03-01': ['Frederic Chopin', 'Justin Bieber', 'Javier Bardem'],
    '03-03': ['Alexander Graham Bell', 'Jessica Biel', 'Camila Cabello'],
    '03-14': ['Albert Einstein', 'Stephen Curry', 'Michael Caine'],
    '03-30': ['Vincent van Gogh', 'Celine Dion', 'Eric Clapton'],
    '04-07': ['Jackie Chan', 'Billie Holiday', 'Russell Crowe'],
    '04-15': ['Leonardo da Vinci', 'Emma Watson', 'Seth Rogen'],
    '04-23': ['William Shakespeare', 'Shirley Temple', 'John Cena'],
    '04-29': ['Uma Thurman', 'Jerry Seinfeld', 'Daniel Day-Lewis'],
    '05-05': ['Karl Marx', 'Adele', 'Henry Cavill'],
    '05-09': ['Billy Joel', 'Rosario Dawson', 'Audrina Patridge'],
    '05-29': ['John F. Kennedy', 'Noel Gallagher', 'Melanie Brown'],
    '06-01': ['Marilyn Monroe', 'Morgan Freeman', 'Heidi Klum'],
    '06-09': ['Johnny Depp', 'Natalie Portman', 'Michael J. Fox'],
    '06-18': ['Paul McCartney', 'Isabella Rossellini', 'Richard Madden'],
    '06-28': ['Elon Musk', 'Mel Brooks', 'Kathy Bates'],
    '07-06': ['Frida Kahlo', 'Sylvester Stallone', '50 Cent'],
    '07-12': ['Pablo Neruda', 'Malala Yousafzai', 'Michelle Rodriguez'],
    '07-26': ['Mick Jagger', 'Sandra Bullock', 'Kevin Spacey'],
    '08-04': ['Barack Obama', 'Louis Armstrong', 'Meghan Markle'],
    '08-13': ['Alfred Hitchcock', 'Fidel Castro', 'Sebastian Stan'],
    '08-19': ['Bill Clinton', 'Coco Chanel', 'Matthew Perry'],
    '09-05': ['Freddie Mercury', 'Michael Keaton', 'Raquel Welch'],
    '09-09': ['Leo Tolstoy', 'Adam Sandler', 'Hugh Grant'],
    '09-25': ['Will Smith', 'Michael Douglas', 'Catherine Zeta-Jones'],
    '10-02': ['Mahatma Gandhi', 'Sting', 'Marion Cotillard'],
    '10-09': ['John Lennon', 'Guillermo del Toro', 'Bella Hadid'],
    '10-28': ['Bill Gates', 'Julia Roberts', 'Joaquin Phoenix'],
    '11-11': ['Leonardo DiCaprio', 'Demi Moore', 'Fyodor Dostoyevsky'],
    '11-19': ['Jodie Foster', 'Meg Ryan', 'Calvin Klein'],
    '11-30': ['Mark Twain', 'Winston Churchill', 'Ben Stiller'],
    '12-05': ['Walt Disney', 'Little Richard', 'Paula Patton'],
    '12-18': ['Brad Pitt', 'Christina Aguilera', 'Steven Spielberg'],
    '12-25': ['Isaac Newton', 'Annie Lennox', 'Humphrey Bogart']
};

function hcYasPad(sayi) {
    return String(sayi).padStart(2, '0');
}

function hcYasFormat(sayi) {
    return sayi.toLocaleString('tr-TR');
}

function hcYasOndalikFormat(sayi) {
    return sayi.toLocaleString('tr-TR', {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    });
}

function hcYasTarihOku(id) {
    var deger = document.getElementById(id).value;
    if (!deger) return null;

    var parca = deger.split('-');
    return new Date(parseInt(parca[0], 10), parseInt(parca[1], 10) - 1, parseInt(parca[2], 10), 0, 0, 0);
}

function hcYasInputTarih(date) {
    return date.getFullYear() + '-' + hcYasPad(date.getMonth() + 1) + '-' + hcYasPad(date.getDate());
}

function hcYasTarihFormatla(date) {
    return date.toLocaleDateString('tr-TR', { day: 'numeric', month: 'long', year: 'numeric' });
}

function hcYasGunAdi(date) {
    return date.toLocaleDateString('tr-TR', { weekday: 'long' });
}

function hcYasTakvimFarki(dogum, hesaplama) {
    var yil = hesaplama.getFullYear() - dogum.getFullYear();
    var ay = hesaplama.getMonth() - dogum.getMonth();
    var gun = hesaplama.getDate() - dogum.getDate();

    if (gun < 0) {
        ay -= 1;
        gun += new Date(hesaplama.getFullYear(), hesaplama.getMonth(), 0).getDate();
    }

    if (ay < 0) {
        yil -= 1;
        ay += 12;
    }

    return { yil: yil, ay: ay, gun: gun };
}

function hcYasSonrakiDogumGunu(dogum, hesaplama) {
    var sonraki = new Date(hesaplama.getFullYear(), dogum.getMonth(), dogum.getDate(), 0, 0, 0);
    if (sonraki < hesaplama) sonraki.setFullYear(sonraki.getFullYear() + 1);
    return sonraki;
}

function hcYasBurc(date) {
    var ay = date.getMonth() + 1;
    var gun = date.getDate();
    if ((ay === 3 && gun >= 21) || (ay === 4 && gun <= 20)) return 'Koç';
    if ((ay === 4 && gun >= 21) || (ay === 5 && gun <= 21)) return 'Boğa';
    if ((ay === 5 && gun >= 22) || (ay === 6 && gun <= 22)) return 'İkizler';
    if ((ay === 6 && gun >= 23) || (ay === 7 && gun <= 22)) return 'Yengeç';
    if ((ay === 7 && gun >= 23) || (ay === 8 && gun <= 22)) return 'Aslan';
    if ((ay === 8 && gun >= 23) || (ay === 9 && gun <= 22)) return 'Başak';
    if ((ay === 9 && gun >= 23) || (ay === 10 && gun <= 22)) return 'Terazi';
    if ((ay === 10 && gun >= 23) || (ay === 11 && gun <= 21)) return 'Akrep';
    if ((ay === 11 && gun >= 22) || (ay === 12 && gun <= 21)) return 'Yay';
    if ((ay === 12 && gun >= 22) || (ay === 1 && gun <= 21)) return 'Oğlak';
    if ((ay === 1 && gun >= 22) || (ay === 2 && gun <= 19)) return 'Kova';
    return 'Balık';
}

function hcYasUnlulerYaz(date) {
    var key = hcYasPad(date.getMonth() + 1) + '-' + hcYasPad(date.getDate());
    var unluler = HC_YAS_UNLULER[key] || [];
    var liste = document.getElementById('hc-yas-unluler');

    liste.innerHTML = '';

    if (!unluler.length) {
        var bos = document.createElement('li');
        bos.textContent = 'Bu tarih için yerel listede ünlü kaydı yok.';
        liste.appendChild(bos);
        return;
    }

    unluler.forEach(function(ad) {
        var item = document.createElement('li');
        item.textContent = ad;
        liste.appendChild(item);
    });
}

function hcYasHesapla() {
    var dogum = hcYasTarihOku('hc-yas-dogum');
    var hesaplama = hcYasTarihOku('hc-yas-hesaplama-tarihi');

    if (!dogum || !hesaplama) {
        alert('Lütfen doğum tarihi ve hesaplama tarihini seçin.');
        return;
    }

    if (dogum > hesaplama) {
        alert('Doğum tarihi hesaplama tarihinden sonra olamaz.');
        return;
    }

    var ms = hesaplama.getTime() - dogum.getTime();
    var toplamSaniye = Math.floor(ms / 1000);
    var toplamDakika = Math.floor(toplamSaniye / 60);
    var toplamSaat = Math.floor(toplamDakika / 60);
    var toplamGun = Math.floor(toplamSaat / 24);
    var toplamHafta = toplamGun / 7;
    var toplamAy = Math.floor(toplamGun / 30.436875);
    var toplamYil = Math.floor(toplamGun / 365.2425);
    var parca = hcYasTakvimFarki(dogum, hesaplama);
    var sonraki = hcYasSonrakiDogumGunu(dogum, hesaplama);
    var kalanGun = Math.ceil((sonraki.getTime() - hesaplama.getTime()) / 86400000);
    var yeniYas = sonraki.getFullYear() - dogum.getFullYear();

    document.getElementById('hc-yas-badge').textContent = hcYasFormat(parca.yil);
    document.getElementById('hc-yas-ana-sonuc').textContent = parca.yil + ' yıl ' + parca.ay + ' ay ' + parca.gun + ' gün';
    document.getElementById('hc-yas-ozet').textContent = 'Hesaplama tarihindeki yaşınız.';
    document.getElementById('hc-yas-dogulan-gun').textContent = hcYasGunAdi(dogum);
    document.getElementById('hc-yas-burc').textContent = hcYasBurc(dogum);
    document.getElementById('hc-yas-sonraki').textContent = hcYasTarihFormatla(sonraki);
    document.getElementById('hc-yas-kalan').textContent = kalanGun === 0 ? 'Bugün' : hcYasFormat(kalanGun) + ' gün';
    document.getElementById('hc-yas-yil').textContent = hcYasFormat(toplamYil) + ' yıl';
    document.getElementById('hc-yas-ay').textContent = hcYasFormat(toplamAy) + ' ay';
    document.getElementById('hc-yas-hafta').textContent = hcYasOndalikFormat(toplamHafta) + ' hafta';
    document.getElementById('hc-yas-gun').textContent = hcYasFormat(toplamGun) + ' gün';
    document.getElementById('hc-yas-saat').textContent = hcYasFormat(toplamSaat) + ' saat';
    document.getElementById('hc-yas-dakika').textContent = hcYasFormat(toplamDakika) + ' dakika';
    document.getElementById('hc-yas-saniye').textContent = hcYasFormat(toplamSaniye) + ' saniye';
    document.getElementById('hc-yas-yeni-yas').textContent = hcYasFormat(yeniYas) + ' yaş';
    document.getElementById('hc-yas-yorum').textContent = kalanGun === 0
        ? 'Bugün doğum gününüz. Yeni yaşınız kutlu olsun!'
        : 'Bir sonraki doğum gününüz ' + hcYasGunAdi(sonraki) + ' günü. Yeni yaşınıza ' + hcYasFormat(kalanGun) + ' gün kaldı.';

    hcYasUnlulerYaz(dogum);
    document.getElementById('hc-yas-result').classList.add('visible');
}

document.addEventListener('DOMContentLoaded', function() {
    var hesaplama = document.getElementById('hc-yas-hesaplama-tarihi');
    if (hesaplama && !hesaplama.value) {
        hesaplama.value = hcYasInputTarih(new Date());
    }
});
