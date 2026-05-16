function hcSpiritualPathHesapla() {
    const birthStr = document.getElementById('hc-sp-birth').value;

    if (!birthStr) {
        alert('Lütfen doğum tarihinizi girin.');
        return;
    }

    const d = new Date(birthStr);
    const day = d.getDate();
    const month = d.getMonth() + 1;
    const year = d.getFullYear();

    function reduce(num) {
        let s = 0;
        while (num > 0 || s > 9) {
            if (num === 0) { num = s; s = 0; }
            s += num % 10;
            num = Math.floor(num / 10);
        }
        return s;
    }

    const spNumber = reduce(reduce(day) + reduce(month) + reduce(year));

    const pathDescriptions = {
        1: "Bağımsızlık ve liderlik yolu. Kendi gerçekliğini yaratmayı öğrenme.",
        2: "Uyum ve denge yolu. Sezgileri kullanarak barış inşa etme.",
        3: "Yaratıcılık ve ifade yolu. Neşeyi ve sanatı dünyaya yayma.",
        4: "İstikrar ve hizmet yolu. Güvenilir bir temel oluşturma.",
        5: "Özgürlük ve deneyim yolu. Değişimi kucaklayarak gelişme.",
        6: "Sevgi ve sorumluluk yolu. Şifa ve adalet sağlama.",
        7: "Bilgelik ve hakikat yolu. Derinleşme ve ruhsal analiz.",
        8: "Güç ve bolluk yolu. Maddi ve manevi dünyayı dengeleme.",
        9: "Evrensellik ve şifa yolu. İnsanlığa koşulsuz hizmet."
    };

    document.getElementById('hc-res-sp-val').innerText = spNumber;
    document.getElementById('hc-res-sp-desc').innerText = pathDescriptions[spNumber] || "";
    document.getElementById('hc-ruhsal-yol-sayisi-hesaplama-result').classList.add('visible');
}
