import express from 'express';
import cors from 'cors';
import mysql from 'mysql2/promise';

const app = express();
const PORT = process.env.PORT || 3000;

// ---------- Connexion MySQL ----------
// ADAPTEZ ces valeurs à votre environnement MySQL
const pool = mysql.createPool({
    host: 'mysql-gonzalez-gomez.alwaysdata.net',        // hôte MySQL
    user: '444518',             // utilisateur MySQL
    password: 'YasHugBapCle',   // mot de passe MySQL
    database: 'gonzalez-gomez_bdd_avis',      // base que vous avez créée (CREATE DATABASE nird_db;)
    waitForConnections: true,
    connectionLimit: 10,
    queueLimit: 0
});

// ---------- Middlewares ----------

app.use(cors());
app.use(express.json());

// Sert les fichiers statiques du dossier "public" : index.html, avis.html, etc.
app.use(express.static('public'));
// GET /api/avis : liste les avis (max 100)
app.get('/api/avis', async (req, res) => {
    try {
        const [rows] = await pool.query(
            `SELECT id, nom, role, message, created_at
             FROM avis
             ORDER BY created_at DESC
             LIMIT 100`
        );
        res.json(rows);
    } catch (err) {
        console.error('Erreur MySQL lors de la lecture des avis :', err);
        res.status(500).json({ error: 'Erreur serveur lors de la récupération des avis.' });
    }
});

// POST /api/avis : ajoute un avis
app.post('/api/avis', async (req, res) => {
    const { nom, role, message } = req.body || {};

    if (!message || typeof message !== 'string' || !message.trim()) {
        return res.status(400).json({ error: 'Le champ "message" est obligatoire.' });
    }

    try {
        const [result] = await pool.query(
            `INSERT INTO avis (nom, role, message)
             VALUES (?, ?, ?)`,
            [nom || null, role || null, message.trim()]
        );

        const insertedId = result.insertId;

        const [rows] = await pool.query(
            `SELECT id, nom, role, message, created_at
             FROM avis
             WHERE id = ?`,
            [insertedId]
        );

        if (rows.length === 0) {
            return res.status(500).json({ error: 'Avis enregistré mais non retrouvé.' });
        }

        res.status(201).json(rows[0]);
    } catch (err) {
        console.error('Erreur MySQL lors de l’enregistrement de l’avis :', err);
        res.status(500).json({ error: 'Erreur serveur lors de l’enregistrement de l’avis.' });
    }
});


// ============================================================
// =============== LANCEMENT DU SERVEUR =======================
// ============================================================

app.listen(PORT, () => {
    console.log(`Serveur NIRD en écoute sur http://localhost:${PORT}`);
});