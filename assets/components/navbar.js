import React from 'react';
import { makeStyles } from '@material-ui/core/styles';
import { AppBar, Avatar, Button, Link, Toolbar, Typography } from '@material-ui/core';

const useStyles = makeStyles((theme) => ({
    root: {
        flexGrow: 1,
    },
    menuButton: {
        marginRight: theme.spacing(2),
    },
    title: {
        flexGrow: 1,
    },
    link: {
        textDecoration: "none",
        color: "white"
    }

}));

function App (props) {
    const classes = useStyles();

    const avatar = "https://api.adorable.io/avatars/30/" + props.user;

    return (
        <div className={classes.root}>
            <AppBar position="fixed">
                <Toolbar>
                    <Typography variant="h6" className={classes.title}>
                        <Link className={classes.link} href="/">
                            Bonjour la biere
                        </Link>
                    </Typography>

                    <div className={classes.menuButton}>
                        <Button href="/about" color="inherit">A propos</Button>
                    </div>
                    <div className={classes.menuButton}>
                        {props.user ? <Link href={props.profile}><Avatar src={avatar} /></Link> : <Button href={props.login} color="inherit">login</Button>}
                    </div>
                    
                </Toolbar>
            </AppBar>
        </div>
    );
}

function Navbar (props) {
    return <App {...props} />;
}

export default Navbar;