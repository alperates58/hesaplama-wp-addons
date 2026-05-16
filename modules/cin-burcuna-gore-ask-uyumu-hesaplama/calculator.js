function hcGetCinBurcu(dateStr) {
    const d = new Date(dateStr);
    const year = d.getFullYear();
    const cnyDates = {
        1930: "1930-01-30", 1931: "1931-02-17", 1932: "1932-02-06", 1933: "1933-01-26", 1934: "1934-02-14",
        1935: "1935-02-04", 1936: "1936-01-24", 1937: "1937-02-11", 1938: "1938-01-31", 1939: "1939-02-19",
        1940: "1940-02-08", 1941: "1941-01-27", 1942: "1942-02-15", 1943: "1943-02-05", 1944: "1944-01-25",
        1945: "1945-02-13", 1946: "1946-02-02", 1947: "1947-01-22", 1948: "1948-02-10", 1949: "1949-01-29",
        1950: "1950-02-17", 1951: "1951-02-06", 1952: "1952-01-27", 1953: "1953-02-14", 1954: "1954-02-03",
        1955: "1955-01-24", 1956: "1956-02-12", 1957: "1957-01-31", 1958: "1958-02-18", 1959: "1959-02-08",
        1960: "1960-01-28", 1961: "1961-02-15", 1962: "1962-02-05", 1963: "1963-01-25", 1964: "1964-02-13",
        1965: "1965-02-02", 1966: "1966-01-21", 1967: "1967-02-09", 1968: "1968-01-30", 1969: "1969-02-17",
        1970: "1970-02-06", 1971: "1971-01-27", 1972: "1972-02-15", 1973: "1973-02-03", 1974: "1974-01-23",
        1975: "1975-02-11", 1976: "1976-01-31", 1977: "1977-02-18", 1978: "1978-02-07", 1979: "1979-01-28",
        1980: "1980-02-16", 1981: "1981-02-05", 1982: "1982-01-25", 1983: "1983-02-13", 1984: "1984-02-02",
        1985: "1985-02-20", 1986: "1986-02-09", 1987: "1987-01-29", 1988: "1988-02-17", 1989: "1989-02-06",
        1990: "1990-01-27", 1991: "1991-02-15", 1992: "1992-02-04", 1993: "1993-01-23", 1994: "1994-02-10",
        1995: "1995-01-31", 1996: "1996-02-19", 1997: "1997-02-07", 1998: "1998-01-28", 1999: "1999-02-16",
        2000: "2000-02-05", 2001: "2001-01-24", 2002: "2002-02-12", 2003: "2003-02-01", 2004: "2004-01-22",
        2005: "2005-02-09", 2006: "2006-01-29", 2007: "2007-02-18", 2008: "2008-02-07", 2009: "2009-01-26",
        2010: "2010-02-14", 2011: "2011-02-03", 2012: "2012-01-23", 2013: "2013-02-10", 2014: "2014-01-31",
        2015: "2015-02-19", 2016: "2016-02-08", 2017: "2017-01-28", 2018: "2018-02-16", 2019: "2019-02-05",
        2020: "2020-01-25", 2021: "2021-02-12", 2022: "2022-02-01", 2023: "2023-01-22", 2024: "2024-02-10",
        2025: "2025-01-29", 2026: "2026-02-17"
    };

    let effYear = year;
    const cny = cnyDates[year] ? new Date(cnyDates[year]) : new Date(year, 0, 30);
    if (d < cny) effYear = year - 1;

    const animals = ["Fare", "Öküz", "Kaplan", "Tavşan", "Ejderha", "Yılan", "At", "Keçi", "Maymun", "Horoz", "Köpek", "Domuz"];
    let idx = (effYear - 1900) % 12;
    if (idx < 0) idx += 12;
    return { name: animals[idx], index: idx };
}

function hcCinAskUyumuHesapla() {
    const d1 = document.getElementById('hc-cluy-date1').value;
    const d2 = document.getElementById('hc-cluy-date2').value;

    if (!d1 || !d2) {
        alert('Lütfen her iki doğum tarihini de seçin.');
        return;
    }

    const b1 = hcGetCinBurcu(d1);
    const b2 = hcGetCinBurcu(d2);

    const animals = ["Fare", "Öküz", "Kaplan", "Tavşan", "Ejderha", "Yılan", "At", "Keçi", "Maymun", "Horoz", "Köpek", "Domuz"];
    
    // Trines (4 years apart)
    const trines = [
        [0, 4, 8], // Fare, Ejderha, Maymun
        [1, 5, 9], // Öküz, Yılan, Horoz
        [2, 6, 10], // Kaplan, At, Köpek
        [3, 7, 11]  // Tavşan, Keçi, Domuz
    ];

    // Clashes (6 years apart)
    const isClash = (idx1, idx2) => Math.abs(idx1 - idx2) === 6;

    const isSameTrine = (idx1, idx2) => {
        for (let t of trines) {
            if (t.includes(idx1) && t.includes(idx2)) return true;
        }
        return false;
    };

    let score = 50;
    let desc = "";

    if (b1.index === b2.index) {
        score = 75;
        desc = "Aynı burca sahipsiniz! Birbirinizin karakterini çok iyi anlıyorsunuz, ancak bu durum bazen benzer inatçılıklar yaratabilir.";
    } else if (isSameTrine(b1.index, b2.index)) {
        score = 95;
        desc = "Mükemmel Uyum! Çin astrolojisine göre siz aynı 'Üçlü Grup' içindesiniz. Birbirinizi doğal bir şekilde tamamlıyor ve destekliyorsunuz.";
    } else if (isClash(b1.index, b2.index)) {
        score = 20;
        desc = "Zorlayıcı İlişki. Burçlarınız arasında 'Zıtlık' (Clash) bulunuyor. Bu, birbirinizi anlamakta zorlanabileceğiniz ve sıkça fikir ayrılığı yaşayabileceğiniz anlamına gelir.";
    } else {
        score = 65;
        desc = "Uyumlu İlişki. Doğrudan bir zıtlığınız yok. İlişkiniz çaba ve karşılıklı anlayışla çok güzel bir noktaya taşınabilir.";
    }

    document.getElementById('hc-cluy-content').innerHTML = `
        <p>1. Kişi: <strong>${b1.name}</strong></p>
        <p>2. Kişi: <strong>${b2.name}</strong></p>
        <div class="hc-score-box">
            <span class="hc-score-label">Uyum Skoru:</span>
            <span class="hc-score-value">${score}%</span>
        </div>
        <p class="hc-desc">${desc}</p>
    `;
    document.getElementById('hc-cin-love-uyum-result').classList.add('visible');
}
