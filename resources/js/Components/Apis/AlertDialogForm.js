import React, { useEffect, useRef, useState } from 'react'
import {
  AlertDialog,
  AlertDialogBody,
  AlertDialogFooter,
  AlertDialogHeader,
  AlertDialogContent,
  AlertDialogOverlay,
  Button,
  Grid,
  Box,
  FormControl,
  FormLabel,
  Input,
  Select,
  Stack,
  Textarea,
  useToast,
} from '@chakra-ui/react'
import { useForm } from '@inertiajs/inertia-react'

const AlertDialogForm = ({ obj = null, isOpen = false, isClosed = false }) => {
  const [title, setTitle] = useState('เพิ่มข้อมูล')
  const [listExchange, setListExchange] = useState(null)
  const { data, setData, post, processing, errors, reset } = useForm({
    exchange_id: '',
    expire_date: '',
    api_key: '',
    api_secret: '',
  })

  const cancelRef = useRef()
  const toast = useToast()

  const onHandleChange = (e) => {
    setData(e.target.name, e.target.value)
  }

  const getExchange = async () => {
    const get = new Promise(async (resolve, reject) => {
      let x = await axios.get(route('api-data.exchange'))
      resolve(await x)
    })

    get.then((r) => {
      setListExchange(r.data.data)
      setData('exchange_id', null)
      setData('expire_date', null)
      setData('api_key', '')
      setData('api_secret', '')
    })
  }

  const submit = (e) => {
    e.preventDefault()
    post(route('api-data.store'), {
      preserveScroll: true,
      resetOnSuccess: false,
      onError: (err) => {
        const er = Object.keys(err)
        er.map((i) => {
          toast({
            title: `${err[i]}`,
            position: 'top-right',
            status: 'error',
            duration: 2500,
            isClosable: true,
            onCloseComplete: () => reset(),
          })
        })
      },
      onSuccess: () => {
        toast({
          title: `บันทึกข้อมูลเสร็จแล้ว`,
          position: 'top-right',
          status: 'success',
          duration: 2500,
          isClosable: true,
          onCloseComplete: () => isClosed(true),
        })
      },
    })
  }

  const onClosedDialog = () => {
    reset()
    isClosed(false)
  }

  /* after mount element */
  useEffect(() => getExchange(), [])

  return (
    <AlertDialog
      isOpen={isOpen}
      leastDestructiveRef={cancelRef}
      onClose={onClosedDialog}
      isCentered
    >
      <AlertDialogOverlay>
        <AlertDialogContent>
          <form onSubmit={submit}>
            <AlertDialogHeader fontSize="lg" fontWeight="bold">
              {title}
            </AlertDialogHeader>

            <AlertDialogBody>
              <Grid columns={1} spacing={10}>
                <Stack direction={['column', 'row']} spacing="24px">
                  <Box>
                    <FormControl isRequired>
                      <FormLabel htmlFor="exchange_id">
                        เลือก Exchange
                      </FormLabel>
                      <Select
                        id="exchange_id"
                        name="exchange_id"
                        placeholder="เลือก Exchange"
                        onChange={onHandleChange}
                        value={data.exchange_id}
                      >
                        {listExchange &&
                          listExchange.map((i) => (
                            <option key={i.id} value={i.id}>
                              {i.name}
                            </option>
                          ))}
                      </Select>
                    </FormControl>
                  </Box>
                  <Box mt={4}>
                    <FormControl isRequired>
                      <FormLabel htmlFor="expire_date">วันที่หมดอายุ</FormLabel>
                      <Input
                        type="date"
                        id="expire_date"
                        name="expire_date"
                        placeholder="ระบุวันที่หมดอายุ"
                        onChange={onHandleChange}
                        value={data.expire_date}
                      />
                    </FormControl>
                  </Box>
                </Stack>
                <Box mt={4}>
                  <FormControl isRequired>
                    <FormLabel htmlFor="api_key">คีย์หลัก(Api Key)</FormLabel>
                    <Textarea
                      id="api_key"
                      name="api_key"
                      placeholder="ระบุ Api Key"
                      onChange={onHandleChange}
                      value={data.api_key}
                    />
                  </FormControl>
                </Box>
                <Box mt={4}>
                  <FormControl isRequired>
                    <FormLabel htmlFor="api_secret">
                      รหัสลับ(Api Secret)
                    </FormLabel>
                    <Textarea
                      id="api_secret"
                      name="api_secret"
                      placeholder="ระบุ Api Secret"
                      onChange={onHandleChange}
                      value={data.api_secret}
                    />
                  </FormControl>
                </Box>
              </Grid>
            </AlertDialogBody>

            <AlertDialogFooter>
              <Button ref={cancelRef} onClick={onClosedDialog}>
                ยกเลิก
              </Button>
              <Button
                type="submit"
                colorScheme="red"
                isLoading={processing}
                ml={3}
              >
                บันทึกข้อมูล
              </Button>
            </AlertDialogFooter>
          </form>
        </AlertDialogContent>
      </AlertDialogOverlay>
    </AlertDialog>
  )
}

export default AlertDialogForm
