import React from 'react';
// import { makeStyles } from '@material-ui/core/styles';
import { AppBar, Button, Link, Toolbar, Typography } from '@material-ui/core';

// const useStyles = makeStyles((theme) => ({
//     root: {
//         flexGrow: 1,
//     },
//         menuButton: {
//         marginRight: theme.spacing(2),
//     },
//         title: {
//         flexGrow: 1,
//     }
// }));

export default function Navbar () {
    // const classes = useStyles();
    return (
        // <div className={classes.root}>
        <div>
            <AppBar position="fixed">
                <Toolbar>
                    {/* <Typography variant="h6" className={classes.title}> */}
                    <Typography variant="h6" >
                        Bonjour la biere
                    </Typography>
                    <Button color="inherit">login</Button>
                </Toolbar>
            </AppBar>
        </div>
    );
}
